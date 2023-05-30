@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>{{ $motorcycle->registration }}</h1>

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
            </ui>
    </div>
    @endif
    <!-- This area is used to dispay errors -->

    <p class="lead text-center">Only authenticated users can access this section.</p>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <h4>Vehicle Details</h4>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row align-items-start">
                            <form action="/motorcycles" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Make" name="make" id="make" value="{{$motorcycle->make}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Model" name="model" id="model" value="{{$motorcycle->model}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Colour" name="colour" id="colour" value="{{old('$motorcycle->colour')}}">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="fuel_type" name="fuel_type" placeholder="Fuel Type" value="{{$motorcycle->fuel_type}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Engine" name="engine" id="engine" value="{{$motorcycle->engine}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Year" name="year" id="year" value="{{$motorcycle->year}}">
                                </div>
                                <div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Euro Status" name="euro_status" id="euro_status" value="{{$motorcycle->euro_status}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Vehicle Age" name="vehicle_age" id="vehicle_age" value="">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Registration Place" name="registration_place" id="registration_place" v0alue="{{$motorcycle->registration_place}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Registration Date" name="registration_date" id="registration_date" value="{{$motorcycle->registration_date}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Last V5C Issue Date" name="last_v5_issue_date" id="last_v5_issue_date" value="{{$motorcycle->last_v5_issue_date}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Type Approval" name="type_approval" id="type_approval" value="{{$motorcycle->type_approval}}">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Wheel Plan" name="wheel_plan" id="wheel_plan" value="{{$motorcycle->wheel_plan}}">
                                </div>
                                <button type="submit" class="btn btn-outline-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <h4>Mileage Information</h4>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="container">
                                <div class="row align-items-start">
                                    <div class="col">
                                        Name:<br>
                                        Driving Licence:<br>
                                        Address:<br>
                                        Mobile:<br>
                                        Email:<br>
                                        Nationality:<br>
                                    </div>
                                    <div class="col">
                                        <br>
                                        <br>

                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <h4>Insurance Details</h4>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Payment history...
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