<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
use Illuminate\Support\Facades\Validator;

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
        // Validate the incoming request
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required | unique:users',
            'nationality' => 'required',
            'driving_licence' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'post_code' => 'required',
        ]);

        // Generating random 9 figure number - not used
        $a = 0;
        for ($i = 0; $i < 6; $i++) {
            $a .= mt_rand(0, 9);
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->nationality = $request->nationality;
        $user->driving_licence = $request->driving_licence;
        $user->username = $request->first_name . $a . $request->last_name;
        $user->street_address = $request->street_address;
        $user->street_address_plus = $request->street_address_plus;
        $user->city = $request->city;
        $user->post_code = $request->post_code;
        $user->is_client = 1;
        $user->save();

        return redirect('/users')
            ->with('success', 'Client has been added to NGM client list.');
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
        $p = Payment::orderBy('id', 'DESC')->where('user_id', $id)->get();
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

        // dd($documents);
        // print_r("In Days: " . $days . "<br>");
        // print_r("In Months: " . $months . "<br>");
        // print_r("In Years: " . $years);

        $address = UserAddress::all()->where('user_id', $id);
        // dd($days);
        return view("users.show", compact("user", "address", "documents", "dlFront", "motorcycles", "payments", "days"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
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
