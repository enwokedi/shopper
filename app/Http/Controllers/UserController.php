<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Motorcycle;
use App\Models\File;
use App\models\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Js;
use Nette\Utils\Json;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('is_client', 1);
        // dd($users);
        return view('home.index_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $u = User::find($id);
        $user = json_decode($u);

        $m = Motorcycle::all()
            ->where('user_id', $id);
        $motorcycles = json_decode($m);

        // $p = Payment::all()->where('user_id', $id);
        $p = Payment::orderBy('payment_due_date', 'DESC')->where('user_id', $id)->get();
        $payments = json_decode($p);

        $now = Carbon::now();
        $toDate = Carbon::parse("2023-05-29");
        $fromDate = Carbon::parse("2022-08-20");

        $days = $toDate->diffInDays($now);
        $months = $toDate->diffInMonths($fromDate);
        $years = $toDate->diffInYears($fromDate);

        $d = File::all()->where('user_id', $id);
        $documents = json_decode($d);
        $dlFront = "Driving Licence Front";

        // print_r("In Days: " . $days . "<br>");
        // print_r("In Months: " . $months . "<br>");
        // print_r("In Years: " . $years);

        $address = UserAddress::all()->where('user_id', $id);
        // dd($days);
        return view("home.show_user", compact("user", "address", "documents", "dlFront", "motorcycles", "payments", "days"));
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
