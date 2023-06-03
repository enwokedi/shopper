<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Rental;
use App\Models\Payment;
use App\Models\Motorcycle;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MotorcycleController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function isForRent()
    {
        $m = Motorcycle::all()
            ->where('is_for_rent', 1)
            ->sortByDesc('id');
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    public function clientForRent(Request $request, $id)
    {
        $user_id = $id;
        $request->session()->put('user_id', $id);

        $m = Motorcycle::all()
            ->where('is_for_rent', 1)
            ->sortByDesc('id');
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index-for-rent', compact('motorcycles', 'count', 'user_id'));
    }

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

        // Create first rental payment
        $payment = new Payment();
        $payment->payment_type = 'rental';
        $payment->rental_price = $rentalPrice;
        $payment->registration = $motorcycle->registration;
        $payment->payment_due_date = $todayDate;
        $payment->received = 00.00;
        $payment->outstanding = $payment->rental_price;
        $payment->user_id = $user_id;
        $payment->payment_due_count = 7;
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
            'is_for_rent' => 0,
            'is_rented' => 1,
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
        ]);

        return to_route('motorcycles.show', [$motorcycle_id])
            ->with('success', 'Motorcycle assigned to this client.');
    }

    public function updateDeposit(Request $request)
    {
        $validated = $request->validate([
            'rental_deposit' => 'required',
        ]);

        $transaction = Payment::all()
            ->where('motorcycle_id', $request->motorcycle_id)
            ->where('payment_type', 'deposit');

        foreach ($transaction as $outstanding) {
            $outstanding = $outstanding->outstanding - $request->rental_deposit;
        }
        $paymentDate = Carbon::now();

        $payment = DB::table('payments')
            ->where('motorcycle_id', '=', $request->motorcycle_id)
            ->where('payment_type', '=', 'deposit')
            ->update([
                'outstanding' => $outstanding,
                'received' => $request->rental_deposit,
                'payment_date' => $paymentDate,
            ]);

        return to_route('motorcycles.show', [$request->motorcycle_id])
            ->with('success', 'Rental deposit updated.');
    }

    public function takePayment(Request $request)
    {
        // Manually update client payments

        // Validate incoming data
        $validated = $request->validate([
            'received' => 'required',
        ]);

        $transaction = Payment::all()
            ->where('motorcycle_id', $request->motorcycle_id)
            ->where('payment_type', 'rental');

        foreach ($transaction as $outstanding) {
            $outstanding = $outstanding->outstanding - $request->received;
        }

        $paymentDate = Carbon::now();

        $payment = DB::table('payments')
            ->where('motorcycle_id', '=', $request->motorcycle_id)
            ->where('payment_type', '=', 'rental')
            ->update([
                'outstanding' => $outstanding,
                'received' => $request->received,
                'payment_date' => $paymentDate,
            ]);

        return to_route('motorcycles.show', [$request->motorcycle_id])
            ->with('success', 'Rental Paid.');
    }

    public function removeFromClient(Request $request, $motorcycle_id)
    {
        $user_id = $request->session()->get('user_id', 'default');
        $request->session()->put('motorcycle_id', $motorcycle_id);

        Motorcycle::findOrFail($motorcycle_id)->update([
            'is_for_rent' => 1,
            'is_rented' => 0,
            'user_id' => null,
            'availability' => null,
        ]);

        return to_route('users.show', [$user_id])
            ->with('success', 'Motorcycle removed from this client.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function isRented()
    {
        $m = Motorcycle::all()
            ->where('is_rented', 1)
            ->sortByDesc('id');
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function isForSale()
    {
        $m = Motorcycle::all()
            ->where('is_for_sale', 1);
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function isUnallocated()
    {
        $m = Motorcycle::all()
            ->where('is_for_sale', '=', 0)
            ->where('is_for_rent', '=', 0)
            ->where('is_rented', '=', 0)
            ->where('is_sold', '=', 0);
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

        $motorcycle = json_decode($response->body());

        $validated = $request->validate([
            'registration' => 'required | unique:motorcycles',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'engine' => 'required',
            'colour' => 'required',

        ]);

        $motorcycle = new Motorcycle();
        $motorcycle->registration = $request->registration;
        $motorcycle->make = $request->make;
        $motorcycle->model = $request->model;
        $motorcycle->year = $request->year;
        $motorcycle->engine = $request->engine;
        $motorcycle->colour = $request->colour;
        $motorcycle->is_for_rent = $request->is_for_rent;
        $motorcycle->is_rented = null;
        $motorcycle->is_for_sale = null;
        $motorcycle->is_sold = null;
        $motorcycle->rental_price = $request->rental_price;

        $motorcycle->save();

        return redirect('/motorcycles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $motorcycle_id)
    {
        // Motorcycle Details
        $m = Motorcycle::findOrFail($motorcycle_id);
        $motorcycle = json_decode($m);

        // Motorcycle Payment History
        $payments = Payment::all()
            ->where('motorcycle_id', $motorcycle_id)
            ->sortByDesc('id');

        return view('motorcycles.show', compact('motorcycle', 'payments'));
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
        //
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
}
