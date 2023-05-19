<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Symfony\Component\Console\Input\Input;

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
        // dd($motorcycles);
        return view('home.index_bike', compact('motorcycles'));
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'displacement' => 'required',
            'colour' => 'required',
            'availability' => 'required',
        ]);

        $motorcycle = new Motorcycle();

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
}
