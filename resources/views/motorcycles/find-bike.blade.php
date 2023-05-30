@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth

    <div class="container-fluid">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-primary" href="{{ URL::to('motorcycles/') }}">Back</a>
        </div>
    </div>
    <br>

    <div class="container mt-5">
        <form action="/registration-number" method="post" enctype="multipart/form-data" class="form-inline text-center">
            <h3 class="text-center mb-5">NGM VEHICLE CHECK</h3>
            @csrf
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
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col">

                    </div>
                    <div class="col">
                        <div class="mb-3 text-center">
                            <input class="form-control" type="text" placeholder="ENTER REG" name="registrationNumber" id="registrationNumber">
                        </div>

                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button class="btn btn-primary btn-block mt-4" type="submit" name="submit">ADD MOTORCYCLE</button>
                        </div>
        </form>
    </div>
    <div class="col">

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