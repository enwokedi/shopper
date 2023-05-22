@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>Client Admin</h1>
    <!-- This area is used to dispay errors -->

    <p class="text-center">Only authenticated users can access this section.</p>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <strong>Client:&nbsp;</strong> {{$user->first_name}} {{$user->last_name}}&nbsp;&nbsp;&nbsp;<strong>Mobile:&nbsp;</strong>{{$user->phone_number}}&nbsp;&nbsp;&nbsp;<strong>Email:&nbsp;</strong>{{$user->email}}
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>
                <div class="accordion-body">
                    <div class="container">
                        <strong>Billing Address</strong>
                        <p>
                            {{$address[1]->street_address}}<br>
                            {{$address[1]->street_address_plus}}<br>
                            {{$address[1]->city}}<br>
                            {{$address[1]->zipcode}}<br>
                        </p>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <strong>Documents</strong>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                                    <p>
                                        <strong>Nationality: </strong>{{ $user->nationality }}<br>
                                        <strong>Driving Licence: </strong>{{ $user->driving_licence }}<br>
                                    </p>
                                </div>
                                <div class="col">
                                    <!-- <a class="btn btn-outline-dark" href="{{ URL::to('/upload-files/' . $user->id) }}">Add Documents</a> -->
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container text-center">
                            <div class="row align-items-start">
                                <div class="col">
                                    <div class="col">
                                        <a class="btn btn-outline-dark" href="{{ URL::to('/upload-files/' . $user->id) }}">Add DL Front</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <a class="btn btn-outline-dark" href="{{ URL::to('/file-dl-back/' . $user->id) }}">Add DL Back</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <a class="btn btn-outline-dark" href="{{ URL::to('/upload-files/' . $user->id) }}">Add CBT</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <a class="btn btn-outline-dark" href="{{ URL::to('/upload-files/' . $user->id) }}">Add ID</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <a class="btn btn-outline-dark" href="{{ URL::to('/upload-files/' . $user->id) }}">Add Address</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <a class="btn btn-outline-dark" href="{{ URL::to('/upload-files/' . $user->id) }}">Add Insurance</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="container">
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Document Type</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($documents as $docuemnt)
                                                <tr>
                                                    <td>{{ $docuemnt->name }}</td>
                                                    <td>{{ $docuemnt->document_type }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <a class="btn btn-small btn-info" href="">Details</a>
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
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <strong>Motorcycles</strong>
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="accordion-body">
                            <div class="container">
                                <!-- List of vehicles rented should go here with link to each vehicles details -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Registration</th>
                                            <th scope="col">Make</th>
                                            <th scope="col">Model</th>
                                            <th scope="col">CC</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Colour</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($motorcycles as $motorcycle)
                                        <tr>
                                            <td>{{$motorcycle->registration}}</th>
                                            <td>{{$motorcycle->make}}</th>
                                            <td>{{$motorcycle->model}}</th>
                                            <td>{{$motorcycle->displacement}}</th>
                                            <td>{{$motorcycle->year}}</th>
                                            <td>{{$motorcycle->colour}}</th>
                                            <td>
                                                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $user->id) }}">Details</a>
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
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapse0Four">
                        <strong>Payments - Next Payment in {{$days}} Days</strong>
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container">
                            <!-- List of vehicles rented should go here with link to each vehicles details -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Received</th>
                                        <th scope="col">Payment Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>£{{$payment->amount}}.00</th>
                                        <td>{{$payment->payment_due_date}}</th>
                                        <td>{{$payment->received}}</th>
                                        <td>{{$payment->payment_date}}</th>
                                        <td>
                                            <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $user->id) }}">Details</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @endauth

            @guest
            <h1>Homepage</h1>
            <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
            @endguest
        </div>
        @endsection