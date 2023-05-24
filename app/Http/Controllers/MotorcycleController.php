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
        return view('home.create_bike');
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
        return view('home.bike_details')->with('motorcycle', $motorcycle);
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

    public function registrationNumber(Request $request, $registrationNumber)
    {
        // $response = Http::withBody('{"registrationNumber": "LJ17YCR"}')->withHeaders(['x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',])
        //     ->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles');

        $response = Http::withHeaders([
            'x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',
            'Content-Type' => 'application/json',
        ])->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
            'registrationNumber' => $registrationNumber,
        ]);

        $motorcycle = json_decode($response->body());
        dd($motorcycle);

        $motorcycle = new Motorcycle();
        $motorcycle->registration = $request->registration;
        $motorcycle->make = $request->make;
        $motorcycle->model = $request->model;
        $motorcycle->year = $request->year;
        $motorcycle->displacement = $request->displacement;
        $motorcycle->colour = $request->colour;
        $motorcycle->availability = $request->availability;

        $motorcycle->save();
    }
}
