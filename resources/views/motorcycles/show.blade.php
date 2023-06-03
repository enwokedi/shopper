@extends('layouts.app-master')

@section('content')

@auth
<h1>{{ $motorcycle->registration }}</h1>
<div class="container-fluid">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-primary" href="{{ URL::to('motorcycles/' . $motorcycle->id . '/edit') }}">Edit</a>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Notes
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-primary" href="/notes">Modal Test</a>
    </div>
</div>
<br>

<!-- This area is used to dispay errors -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <strong>{{ $message }}</strong>
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- This area is used to dispay errors -->

<div class="container-fluid mt-3 mx-1500">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold">Vehicle Details</h5>
                    <div class="card-body pd-remove-small pt-0">
                        <table class="table">
                            <tbody>
                                <tr class="text-right">
                                    <td>Make </td>
                                    <td class="text-end text-capitalize">{{ $motorcycle->make}}</td>
                                </tr>
                                <tr>
                                    <td>Model </td>
                                    <td class="text-end">{{$motorcycle->model}}</td>
                                </tr>
                                <tr>
                                    <td>Colour </td>
                                    <td class="text-end">{{$motorcycle->colour}}</td>
                                </tr>
                                <tr>
                                    <td>Engine </td>
                                    <td class="text-end">{{$motorcycle->engine}}CC</td>
                                </tr>

                                <tr>
                                    <td>Fuel Type </td>
                                    <td class="text-end">{{$motorcycle->fuel_type}}</td>
                                </tr>
                                <tr>
                                    <td>Year </td>
                                    <td class="text-end">{{$motorcycle->year}}</td>
                                </tr>
                                <tr>
                                    <td>Tax Status </td>
                                    <td class="text-end">{{$motorcycle->tax_status}}</td>
                                </tr>
                                <tr>
                                    <td>Tax Due Date </td>
                                    <td class="text-end">{{$motorcycle->tax_due_date}}</td>
                                </tr>
                                <tr>
                                    <td>MOT Status </td>
                                    <td class="text-end">{{$motorcycle->mot_status}}</td>
                                </tr>

                                <tr>
                                    <td>MOT Expiry Date </td>
                                    <td class="text-end">{{$motorcycle->mot_expiry_date}}</td>
                                </tr>
                                <tr>
                                    <td>C02 Emmissions </td>
                                    <td class="text-end">{{$motorcycle->co2_emissions}}</td>
                                </tr>
                                <tr>
                                    <td>Marked for Export </td>
                                    <td class="text-end">{{$motorcycle->marked_for_export}}</td>
                                </tr>
                                <tr>
                                    <td>Type Approval </td>
                                    <td class="text-end">{{$motorcycle->type_approval}}</td>
                                </tr>
                                <tr>
                                    <td>Last V5 Issue Date </td>
                                    <td class="text-end">{{$motorcycle->last_v5_issue_date}}</td>
                                </tr>
                                <tr>
                                    <td>Wheel Plan </td>
                                    <td class="text-end">{{$motorcycle->wheel_plan}}</td>
                                </tr>
                                <tr>
                                    <td>Month of First Registration </td>
                                    <td class="text-end">{{$motorcycle->month_of_first_registration}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-body">
                        <h5>Deposit Payment</h5>
                        <div class="container">
                            <form action="/update-deposit/{{$motorcycle->id}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div hidden class="mb-3">
                                    <input class="form-control" type="text" placeholder="Motorcycle ID"
                                        name="motorcycle_id" id="motorcycle_id" value="{{$motorcycle->id}}">
                                </div>
                                <div hidden class="mb-3">
                                    <input class="form-control" type="text" placeholder="Rental Type"
                                        name="payment_type" id="payment_type" value="deposit">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">£</span>
                                    <input type="text" class="form-control" placeholder="00.00"
                                        aria-label="Change Deposit" name="rental_deposit" id="rental_deposit"
                                        value="{{old('$motorcycle->rental_deposit')}}">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-body">
                        <h5 class="text-capitalize">Status: {{$motorcycle->availability}}</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Rental Start Date</td>
                                    <td class="text-end">{{$motorcycle->rental_start_date}}</td>
                                </tr>
                                <tr>
                                    <td>Weekly Rental Price</td>
                                    <td class="text-end">£{{$motorcycle->rental_price}}</td>
                                </tr>
                                <tr>
                                    <td>Default Deposit </td>
                                    <td class="text-end">£{{$motorcycle->rental_deposit}}</td>
                                </tr>
                                <tr>
                                    <td>Tax Status </td>
                                    <td class="text-end">{{$motorcycle->tax_status}}</td>
                                </tr>
                                <tr>
                                    <td>MOT Status </td>
                                    <td class="text-end">{{$motorcycle->mot_status}}</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-body">
                        <h5>Rental Payment</h5>
                        <div class="container">
                            <form action="/take-payment/{{$motorcycle->id}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div hidden class="mb-3">
                                    <input class="form-control" type="text" placeholder="Motorcycle ID"
                                        name="motorcycle_id" id="motorcycle_id" value="{{$motorcycle->id}}">
                                </div>
                                <div hidden class="mb-3">
                                    <input class="form-control" type="text" placeholder="Rental Type"
                                        name="payment_type" id="payment_type" value="rental">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">£</span>
                                    <input type="text" class="form-control" placeholder="00.00"
                                        aria-label="Take Payment" name="received" id="received"
                                        value="{{old('received')}}">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">

                    <div class="card-body">
                        <h5>Payment History</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Received</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Due</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <td>{{$payment->payment_due_date}}</td>
                                    <td class="text-capitalize">{{$payment->payment_type}}</td>
                                    <td>£{{$payment->received}}</td>
                                    <td>{{$payment->payment_date}}</td>
                                    <td class="text-danger">£{{$payment->outstanding}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <a class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop-{{ $payment->id }}">
                                            Note
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop-{{ $payment->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                            Take Note</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="/take-note/$payment->id" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <input hidden name="payment_id" id="payment_id"
                                                                    value="{{ $payment->id }}">
                                                                <textarea class="form-control"
                                                                    aria-label="With textarea" id="notes" name="notes"
                                                                    value="{{ $payment->notes }}">{{ $payment->notes
                                                                }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endauth

@guest
<h1>Homepage</h1>
<p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
@endguest

@endsection
