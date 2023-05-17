<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Motorcycle;
use App\Models\Rental;

class RentalController extends Controller
{
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

        $rent = User::all();
        // $u = $rent->user;

        $users = json_decode($u);

        foreach ($users as $user) {
            $r = Rental::all()
                ->where('user_id', $user->id);
        }

        $rentals = json_decode($r);
        $count_rentals = $r->count();
        dd($rent);
        // return view("home.dashboard", compact("rentals"))->with("users");
        return view('home.dashboard', [
            'users' => $users,
            'rentals' => $rentals,
            // 'motorcycles' => $motorcycles
        ]);
    }

    /**
     * Show the form for creating a new resource.
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
        //
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
