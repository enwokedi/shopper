<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Motorcycle;
use App\Models\Rental;
use App\models\Payment;
use Illuminate\View\View;

class RentalController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $rentals = User::find(5)->rentals;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $u = User::whereHas('rentals', function ($query) {
            return $query->where('user_id', '>', 0);
        })->get();

        $users = json_decode($u);

        foreach ($users as $user) {
            $r = Rental::all()
                ->where('user_id', $user->id);
        }

        $rentals = json_decode($r);
        // dd($rentals);

        return view("home.index_rentals", compact("rentals", "users"));
    }

    /**
     * Show the form for creating a new rental.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Add Client";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // Get specific rental agreement
        $rental = Rental::find($id);

        // Show the view and pass1 the rental to it
        return View::make('home.show_rentals')
            ->with('rental', $rental);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $r = Rental::find($id);
        $rental = json_decode($r);

        $m = Motorcycle::all()
            ->where('rental_id', $id);
        $motorcycles = json_decode($m);

        $uid = $r->user_id;
        $use = User::find($uid);
        $user = json_decode($use);

        $p = Payment::all()->where('user_id', $uid);
        $payments = json_decode($p);

        // dd($motorcycles);
        return view("home.show-payments-due", compact("rental", "user", "motorcycles", "payments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('home.edit');
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
