<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m = Motorcycle::all();
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
            ->where('is_for_rent', 1);
        $motorcycles = json_decode($m);

        $count = $m->count();
        return view('motorcycles.index', compact('motorcycles', 'count'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function isRented()
    {
        $m = Motorcycle::all()
            ->where('is_rented', 1);
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
    public function store(Request $request, $registrationNumber)
    {
        $response = Http::withHeaders([
            'x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',
            'Content-Type' => 'application/json',
        ])->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
            'registrationNumber' => $registrationNumber,
        ]);

        $motorcycle = json_decode($response->body());
        dd($motorcycle);

        $validated = $request->validate([
            'registration' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'displacement' => 'required',
            'colour' => 'required',
            'availability' => 'required',
        ]);

        $motorcycle = new Motorcycle();
        $motorcycle->registration = $request->registration;
        $motorcycle->make = $request->make;
        $motorcycle->model = $request->model;
        $motorcycle->year = $request->year;
        $motorcycle->displacement = $request->displacement;
        $motorcycle->colour = $request->colour;
        $motorcycle->availability = $request->availability;

        $motorcycle->save();

        return redirect('/motorcycles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m = Motorcycle::find($id);
        $motorcycle = json_decode($m);

        // dd($motorcycles);
        return view('motorcycles.show')->with('motorcycle', $motorcycle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function registrationNumber(Request $request)
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

        $motorcycle->save();

        return to_route('motorcycles.show', [$motorcycle->id])
            ->with('success', 'Vehicle details have been added to the database.');
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

        return view('motorcycles.show', compact('motorcycle'))
            ->with('success', 'Vehicle information retrieved successfully.');;
    }
}
