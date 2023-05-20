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
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row align-items-start">
                                Documents area...
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
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Vehicle list area...
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapse0Four">
                        <strong>Payments</strong>
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Payments area...
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