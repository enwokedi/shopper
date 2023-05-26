<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Carbon;
use App\Models\User;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    public function createRental($id)
    {
        $user_id = $id;
        return view('payments.create-rental', compact('user_id'));
    }

    public function storeRental(Request $request)
    {
        $validated = $request->validate([
            'payment_type' => 'required',
            'amount' => 'required',
        ]);

        $user_id = $request->user_id;
        $weeklyPayments = $request->amount;
        $deposit = $request->amount * 3;

        // Store the deposit amount along with details
        $payment = new Payment();
        $payment->payment_type = $request->payment_type;
        $payment->amount = $deposit;
        $payment->payment_due_date = Carbon::now();
        $payment->payment_date = Carbon::now();
        $payment->user_id = $user_id;
        $payment->save();

        // Create first rental payment
        $payment = new Payment();
        $payment->payment_type = 'rental';
        $payment->amount = $weeklyPayments;
        $payment->payment_due_date = Carbon::now();
        $payment->user_id = $user_id;
        $payment->save();

        return to_route('users.show', [$payment->user_id])
            ->with('success', 'Deposit has been recorded. Now record first week rental.');
    }


    public function userPayment($id)
    {
        $user_id = $id;
        return view('payments.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_type' => 'required',
            'amount' => 'required',
        ]);

        $payment = new Payment();
        $payment->payment_type = $request->payment_type;
        $payment->amount = $request->amount;
        // $payment->payment_date = Carbon::now();
        $payment->user_id = $request->user_id;
        $payment->save();

        return to_route('users.show', [$payment->user_id])
            ->with('success', 'Payment has been recorded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($payment_id)
    {
        $payment = Payment::findOrFail($payment_id);

        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $payment_id)
    {
        $dt = Carbon::now();
        $nextDueDate = $dt->addDays(8);

        Payment::findOrFail($payment_id)->update([

            'amount' => $request->amount,
            'payment_date' => Carbon::now(),

        ]);

        $payment = new Payment();
        $payment->payment_type = 'rental';
        $payment->amount = $request->amount;
        $payment->payment_due_date = $nextDueDate;
        $payment->user_id = $request->user_id;
        $payment->save();

        return to_route('users.show', [$request->user_id])
            ->with('success', 'Payment has been recorded.');
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
