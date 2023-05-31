@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>Create Motorcycle</h1>
    <div class="container-fluid">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
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
            </ui>
    </div>
    @endif

    <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col">
                        <h4>Basic Setup Details</h4>
                        <form action="/motorcycles" method="post" enctype="multipart/form-data">
                            @csrf
                            <select class="form-select mb-3" aria-label="Default select example">
                                <option selected>Select Make</option>
                                <option value="honda">Honda</option>
                                <option value="yamaha">Yamaha</option>
                            </select>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Model" name="model" id="model">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Colour" name="colour" id="colour">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Fuel Type" id="fuel_type" name="year">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Engine" aria-label="engine" aria-describedby="engine" name="displacement" id="displacement">
                                <span class="input-group-text" id="engine_cc">CC</span>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Registration" name="registration" id="registration">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="is_for_rent">
                                <label class="form-check-label" for="is_for_rent">
                                    For Rent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="is_rented">
                                <label class="form-check-label" for="is_rented">
                                    Rented
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="is_for_sale">
                                <label class="form-check-label" for="is_for_sale">
                                    For Sale
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="id_sold">
                                <label class="form-check-label" for="is_sold">
                                    Sold
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="is_for_rent">
                                <label class="form-check-label" for="is_for_rent">
                                    For Rent
                                </label>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">£</span>
                                <input type="text" class="form-control" aria-label="Rental Price (to the nearest pound)" name="rental_price" id="rental_price">
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Rental Deposit Weeks" name="rentatl_deposit_weeks" id="rental_deposit_weeks">
                            </div>


                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

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
</div>
@endsection