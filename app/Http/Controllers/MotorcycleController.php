<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Rental;
use App\Models\Payment;
use Illuminate\View\View;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class MotorcycleController extends Controller
{
    // Calculate next payment days
    public function nextRentalPayment()
    {
        // Update motocycle rental next payment date
        $motorcycles = Motorcycle::where('next_payment_date', '<=', Carbon::now()->addDay()->toDateTimeString())->get();

        dd($motorcycles);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m = Motorcycle::orderBy('id', 'DESC')->get();
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motorcycles.create');
    }

    /**
     * Adds newly created motorcycles to the Motorcycles database table
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',
            'Content-Type' => 'application/json',
        ])->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
            'registrationNumber' => $request->registration,
        ]);

        $motorcycleGov = json_decode($response->body());
        // dd($motorcycleGov);
        $validated = $request->validate([
            'registration' => 'required | unique:motorcycles',

        ]);

        $motorcycle = new Motorcycle();
        $motorcycle->registration = $motorcycleGov->registrationNumber;
        $motorcycle->make = $motorcycleGov->make;
        $motorcycle->model = $request->model;
        $motorcycle->year = $motorcycleGov->yearOfManufacture;
        $motorcycle->engine = $motorcycleGov->engineCapacity;
        $motorcycle->colour = $motorcycleGov->colour;
        $motorcycle->availability = $request->availability;
        $motorcycle->rental_price = $request->rental_price;
        $motorcycle->year = $motorcycleGov->yearOfManufacture;
        $motorcycle->fuel_type = $motorcycleGov->fuelType;
        $motorcycle->wheel_plan = $motorcycleGov->wheelplan;
        $motorcycle->tax_status = $motorcycleGov->taxStatus;
        $motorcycle->tax_due_date = $motorcycleGov->taxDueDate;
        $motorcycle->mot_status = $motorcycleGov->motStatus;
        $motorcycle->mot_expiry_date = $motorcycleGov->motExpiryDate;
        $motorcycle->co2_emissions = $motorcycleGov->co2Emissions;
        $motorcycle->marked_for_export = $motorcycleGov->markedForExport;
        $motorcycle->type_approval = $request->typeApproval;
        $motorcycle->last_v5_issue_date = $motorcycleGov->dateOfLastV5CIssued;
        $motorcycle->month_of_first_registration = $motorcycleGov->monthOfFirstRegistration;
        $motorcycle->euro_status = $motorcycleGov->euroStatus;
        $motorcycle->availability = $request->availability;

        $motorcycle->save();

        return redirect('/motorcycles');
    }

    // Manually take deposit payment
    public function updateDeposit(Request $request)
    {
        $validated = $request->validate([
            'rental_deposit' => 'required',
        ]);

        $motorcycle = Motorcycle::findOrFail($request->motorcycle_id);

        $transaction = Payment::all()
            ->where('motorcycle_id', $request->motorcycle_id)
            ->where('payment_type', 'deposit');

        foreach ($transaction as $outstanding) {
            $outstanding = $outstanding->outstanding - $request->rental_deposit;
        }
        $paymentDate = Carbon::now();

        $authUser = Auth::user();

        $payment = new Payment();
        $payment->payment_due_date = $motorcycle->rental_start_date;
        $payment->payment_type = 'deposit';
        $payment->received = $request->rental_deposit;
        $payment->payment_date = $paymentDate;
        $payment->outstanding = $outstanding;
        $payment->user_id = $motorcycle->user_id;
        $payment->motorcycle_id = $request->motorcycle_id;
        $payment->registration = $motorcycle->registration;
        $payment->auth_user = $authUser->first_name . " " . $authUser->last_name;
        $payment->save();

        return to_route('motorcycles.show', [$request->motorcycle_id])
            ->with('success', 'Rental deposit updated.');
    }

    public function createPayment()
    {
        $last = DB::table('payments')->latest()->first();
        dd($last);
        $payment_due_date = Carbon::parse($last->payment_due_date);
        $payment_due_date->addDays(7);
        $authUser = Auth::user();

        $motorcycle = Motorcycle::findOrFail($last->motorcycle_id);
        $rentalPrice = $motorcycle->rental_price;
        $todayDate = Carbon::now();
        $nextPayDate = Carbon::now();
        $nextPayDate->addDays(7);

        $payment = new Payment();
        $payment->payment_type = 'rental';
        $payment->rental_price = $rentalPrice;
        $payment->registration = $motorcycle->registration;
        $payment->payment_due_date = $nextPayDate->addDays(7);
        $payment->payment_next_date = $nextPayDate->addDays(7);
        $payment->received = 00.00;
        $payment->outstanding = $rentalPrice;
        $payment->user_id = $last->user_id;
        $payment->payment_due_count = 7;
        $payment->created_at = $todayDate;
        $payment->auth_user = $authUser->first_name . " " . $authUser->last_name;
        $payment->motorcycle_id = $last->motorcycle_id;
        $payment->save();

        return to_route('motorcycles.show', [$last->motorcycle_id])
            ->with('success', 'Rental payment updated.');
    }

    // Manually take the rental payment
    public function takePayment(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'received' => 'required',
        ]);

        $motorcycle = Motorcycle::findOrFail($request->motorcycle_id);

        $rentalPrice = $motorcycle->rental_price;
        $registration = $motorcycle->registration;

        $transaction = Payment::orderBy('updated_at', 'DESC')
            ->where('motorcycle_id', $request->motorcycle_id)
            ->where('payment_type', 'rental')
            ->where('created_at', '<=', Carbon::now())
            ->where('outstanding', '>', 0)
            ->first();

        $updatePayment = Payment::where('created_at', '<=', Carbon::now())
            ->where('motorcycle_id', $request->motorcycle_id)
            ->where('payment_type', 'rental')
            ->where('outstanding', '>', 0)
            ->get();
        // dd($updatePayment);

        $paymentDate = Carbon::now();

        $authUser = Auth::user();

        $payment = new Payment();
        $payment->payment_id = $transaction->id;
        $payment->payment_due_date = $motorcycle->rental_start_date;
        $payment->rental_price = $motorcycle->rental_price;
        $payment->payment_type = 'rental';
        $payment->received = $request->received;
        $payment->payment_date = $paymentDate;
        $payment->outstanding = $transaction->outstanding - $request->received;
        $payment->user_id = $motorcycle->user_id;
        $payment->motorcycle_id = $request->motorcycle_id;
        $payment->registration = $motorcycle->registration;
        $payment->auth_user = $authUser->first_name . " " . $authUser->last_name;
        $payment->save();

        return to_route('motorcycles.show', [$request->motorcycle_id])
            ->with('success', 'Rental payment updated.');
    }

    // Find motorcycles for sale
    public function clientForRent(Request $request, $id)
    {
        $user_id = $id;
        $request->session()->put('user_id', $id);

        $m = Motorcycle::all()
            ->where('availability', '=', 'for rent')
            ->sortByDesc('id');
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index-for-rent', compact('motorcycles', 'count', 'user_id'));
    }

    // Assign motorcycle to client for rental
    public function addToClient(Request $request, $motorcycle_id)
    {
        $user_id = $request->session()->get('user_id', 'default');
        // $request->session()->put('motorcycle_id', $motorcycle_id);
        $authUser = Auth::user();

        $motorcycle = Motorcycle::findOrFail($motorcycle_id);
        $motorcycleDeposit = $motorcycle->rental_price * 2;
        $rentalPrice = $motorcycle->rental_price;
        $registration = $motorcycle->registration;
        $todayDate = Carbon::now();
        $nextPayDate = Carbon::now();
        // $nextPayDate->addDays(7);

        // Create first rental payment
        $payment = new Payment();
        $payment->payment_type = 'rental';
        $payment->rental_price = $rentalPrice;
        $payment->registration = $motorcycle->registration;
        $payment->payment_due_date = $todayDate;
        $payment->payment_next_date = $nextPayDate->addDays(7);
        $payment->received = null;
        $payment->outstanding = $payment->rental_price;
        $payment->user_id = $user_id;
        $payment->payment_due_count = 7;
        $payment->created_at = $todayDate;
        $payment->auth_user = $authUser->first_name . " " . $authUser->last_name;
        $payment->motorcycle_id = $motorcycle_id;
        $payment->save();

        // Create deposit
        $payment = new Payment();
        $payment->payment_type = 'deposit';
        $payment->rental_deposit = $motorcycleDeposit;
        $payment->registration = $motorcycle->registration;
        $payment->payment_due_date = $todayDate;
        $payment->received = 00.00;
        $payment->outstanding = $payment->rental_deposit;
        $payment->user_id = $user_id;
        $payment->created_at = $todayDate;
        $payment->auth_user = $authUser->first_name . " " . $authUser->last_name;
        $payment->motorcycle_id = $motorcycle_id;
        $payment->save();

        $response = Http::withHeaders([
            'x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',
            'Content-Type' => 'application/json',
        ])->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
            'registrationNumber' => $registration,
        ]);

        $request = json_decode($response->body());

        // Update Motorcycle Status
        Motorcycle::findOrFail($motorcycle_id)->update([
            'user_id' => $user_id,
            'availability' => 'rented',
            'rental_deposit' => $motorcycleDeposit,
            'rental_start_date' => $todayDate,
            'make' => $request->make,
            'colour' => $request->colour,
            'year' => $request->yearOfManufacture,
            'engine' => $request->engineCapacity,
            'fuel_type' => $request->fuelType,
            'wheel_plan' => $request->wheelplan,
            'tax_status' => $request->taxStatus,
            'tax_due_date' => $request->taxDueDate,
            'mot_status' => $request->motStatus,
            'co2_emissions' => $request->co2Emissions,
            'marked_for_export' => $request->markedForExport,
            'type_approval' => $request->typeApproval,
            'last_v5_issue_date' => $request->dateOfLastV5CIssued,
            'mot_expiry_date' => $request->motExpiryDate,
            'month_of_first_registration' => $request->monthOfFirstRegistration,
            'next_payment_date' => $nextPayDate,
        ]);

        return to_route('motorcycles.show', [$motorcycle_id])
            ->with('success', 'Motorcycle assigned to this client.');
    }

    // Remove the rental motorcycle from the client
    public function removeFromClient(Request $request, $motorcycle_id)
    {
        $user_id = $request->session()->get('user_id', 'default');
        $request->session()->put('motorcycle_id', $motorcycle_id);

        Motorcycle::findOrFail($motorcycle_id)->update([
            'user_id' => null,
            'availability' => 'for rent',
        ]);

        return to_route('users.show', [$user_id])
            ->with('success', 'Motorcycle removed from this client.');
    }

    // Motorcycle Availability
    public function isForRent()
    {
        $m = Motorcycle::all()
            ->where('availability', '=', 'for rent')
            ->sortByDesc('id');
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    public function isRented()
    {
        $m = Motorcycle::all()
            ->where('availability', '=', 'rented')
            ->sortByDesc('id');
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    public function isForSale()
    {
        $m = Motorcycle::all()
            ->where('availability', '=', 'for sale');
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    public function isUnallocated()
    {
        $m = Motorcycle::all()
            ->where('availability', null);
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    /**
     * Motorcycle details & transactional data
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $motorcycle_id)
    {
        // Motorcycle Details
        $m = Motorcycle::findOrFail($motorcycle_id);
        $motorcycle = json_decode($m);

        // Motorcycle Payment Notes
        $notes = Note::all()
            ->where('motorcycle_id', $motorcycle_id)
            ->sortByDesc('id');

        // Motorcycle Payment History
        $depositpayments = Payment::all()
            ->where('motorcycle_id', $motorcycle_id)
            ->where('payment_type', '=', 'deposit')
            ->sortByDesc('id');

        $newpayments = Payment::all()
            ->where('motorcycle_id', $motorcycle_id)
            ->where('payment_type', '=', 'rental')
            ->where('outstanding', '>', 1)
            ->where('received', '=', 0)
            ->sortByDesc('id');

        $rentalpayments = Payment::all()
            ->where('motorcycle_id', $motorcycle_id)
            ->where('payment_type', '=', 'rental')
            // ->where('outstanding', '>', 0)
            ->sortByDesc('updated_at');

        return view('motorcycles.show', compact('motorcycle', 'depositpayments', 'rentalpayments', 'newpayments', 'notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $m = Motorcycle::find($id);
        $motorcycle = json_decode($m);

        return view('motorcycles.edit', compact('motorcycle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $availability = $request->availability;
        $rentalPrice = $request->rentalprice;

        $response = Http::withHeaders([
            'x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',
            'Content-Type' => 'application/json',
        ])->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
            'registrationNumber' => $request->registration,
        ]);

        $request = json_decode($response->body());

        Motorcycle::findOrFail($id)->update([
            // .Gov data from reg check
            'make' => $request->make,
            'colour' => $request->colour,
            'year' => $request->yearOfManufacture,
            'engine' => $request->engineCapacity,
            'fuel_type' => $request->fuelType,
            'wheel_plan' => $request->wheelplan,
            'tax_status' => $request->taxStatus,
            'tax_due_date' => $request->taxDueDate,
            'mot_status' => $request->motStatus,
            'co2_emissions' => $request->co2Emissions,
            'marked_for_export' => $request->markedForExport,
            // 'type_approval' => $request->typeApproval,
            'last_v5_issue_date' => $request->dateOfLastV5CIssued,
            // 'mot_expiry_date' => $request->motExpiryDate, // Not returned if MOT Status = No data held by DVLA
            'month_of_first_registration' => $request->monthOfFirstRegistration,

            // Status information
            'updated_at' => Carbon::now(),
            'rental_price' => $rentalPrice,
            'availability' => $availability,
        ]);

        return to_route('motorcycles.show', [$id])
            ->with('success', 'Vehicle details have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for finding a new motorcycle.
     *
     * @return \Illuminate\Http\Response
     */
    public function findMotorcycle()
    {
        return view('motorcycles.find-bike');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrationNumber(Request $request)
    {
        $bike = Motorcycle::all()->where('registration', '=', $request->registrationNumber);

        if (isset($bike)) {
            return to_route('findMotorcycle')->with('success', 'Motorcycle already exists. Please enter a new registratrion number.');
        } else
        if (is_null($bike)) {
            $response = Http::withHeaders([
                'x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',
                'Content-Type' => 'application/json',
            ])->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
                'registrationNumber' => $request->registrationNumber,
            ]);

            $request = json_decode($response->body());

            $motorcycle = new Motorcycle();
            $motorcycle->registration = $request->registrationNumber;
            $motorcycle->make = $request->make;
            $motorcycle->tax_status = $request->taxStatus;
            $motorcycle->tax_due_date = $request->taxDueDate;
            $motorcycle->mot_status = $request->motStatus;
            $motorcycle->year = $request->yearOfManufacture;
            $motorcycle->engine = $request->engineCapacity;
            $motorcycle->co2_emissions = $request->co2Emissions;
            $motorcycle->fuel_type = $request->fuelType;
            $motorcycle->marked_for_export = $request->markedForExport;
            $motorcycle->colour = $request->colour;
            $motorcycle->type_approval = $request->typeApproval;
            $motorcycle->last_v5_issue_date = $request->dateOfLastV5CIssued;
            $motorcycle->mot_expiry_date = $request->motExpiryDate;
            $motorcycle->wheel_plan = $request->wheelplan;
            $motorcycle->month_of_first_registration = $request->monthOfFirstRegistration;
            $motorcycle->save();

            return to_route('motorcycles.show', [$motorcycle->id])
                ->with('success', 'Vehicle details have been added to the database.');
        }
    }

    /**
     * Show the form for finding a new motorcycle.
     *
     * @return \Illuminate\Http\Response
     */
    public function vehicleCheckForm()
    {
        return view('motorcycles.check-vehicle');
    }

    public function vehicleCheck(Request $request)
    {
        $response = Http::withHeaders([
            'x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',
            'Content-Type' => 'application/json',
        ])->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
            'registrationNumber' => $request->registrationNumber,
        ]);

        $request = json_decode($response->body());

        $motorcycle = new Motorcycle();
        $motorcycle->registration = $request->registrationNumber;
        $motorcycle->make = $request->make;
        $motorcycle->tax_status = $request->taxStatus;
        $motorcycle->tax_due_date = $request->taxDueDate;
        $motorcycle->mot_status = $request->motStatus;
        $motorcycle->year = $request->yearOfManufacture;
        $motorcycle->engine = $request->engineCapacity;
        $motorcycle->co2_emissions = $request->co2Emissions;
        $motorcycle->fuel_type = $request->fuelType;
        $motorcycle->marked_for_export = $request->markedForExport;
        $motorcycle->colour = $request->colour;
        $motorcycle->type_approval = $request->typeApproval;
        $motorcycle->last_v5_issue_date = $request->dateOfLastV5CIssued;
        $motorcycle->mot_expiry_date = $request->motExpiryDate;
        $motorcycle->wheel_plan = $request->wheelplan;
        $motorcycle->month_of_first_registration = $request->monthOfFirstRegistration;

        // dd($motorcycle);

        return view('motorcycles.show-check', compact('motorcycle'))
            ->with('success', 'Vehicle information retrieved successfully.');;
    }

    //// PAYMENTS SECTION /////


    // create payment transactions
    public function clientPartPayment($motorcycle_id)
    {
        $rental = Payment::all()
            ->where('motorcycle_id', $motorcycle_id);
        dd($rental);
    }
}
