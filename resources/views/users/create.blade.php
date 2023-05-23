@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <div class="btn-group pull-right" role="group" aria-label="Basic example">
        <a class="btn btn-primary" href="{{ URL::to('users/') }}">All Users</a>
    </div>
    <div class="container-fluid">
        <h1>Create New Client</h1>

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

        <p class="lead text-center">Only authenticated users can access this section.</p>

    </div>
    <div class="container">
        <form action="/users" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input class="form-control" type="text" placeholder="First Name*" aria-label="default input example" name="first_name" id="first_name">
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" placeholder="Last Name*" aria-label="default input example" name="last_name" id="last_name">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Select Gender" name="gender" id="gender">
                    <option selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" placeholder="Phone Number*" aria-label="default input example" name="phone_number" id="phone_number">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Address*">
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" placeholder="Nationality*" aria-label="default input example" name="nationality" id="nationality">
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" placeholder="Driving Licence*" aria-label="default input example" name="driving_licence" id="driving_licence">
            </div>

            <!-- <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div> -->
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection