<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Nette\Utils\Json;
use App\models\Payment;
use App\Models\Motorcycle;
use Illuminate\Support\Js;
use App\Models\UserAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

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
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate and store the new client information
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'nationality' => 'required',
            'driving_licence' => 'required',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->nationality = $request->nationality;
        $user->driving_licence = $request->driving_licence;
        $user->save();

        return back()
            ->with('success', 'File has been uploaded.');
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
