@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>{{ $count }} Motorcycle(s)</h1>
    <div class="container-fluid">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-primary" href="{{ URL::to('motorcycles/') }}">All</a>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-primary" href="{{ URL::to('is_for_rent/') }}">For Rent</a>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-primary" href="{{ URL::to('is_rented/') }}">Rented</a>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-primary" href="{{ URL::to('is_for_sale/') }}">For Sale</a>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-primary" href="{{ URL::to('unallocated/') }}">Unallocated</a>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Find Vehicle
        </button>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- <div class="modal-header">
                        <h5 class="modal-title w-100 text-center" id="staticBackdropLabel">ENTER REGISTRATION NUMBER</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div> -->
                    <div class="modal-body">
                        <!-- Modal Contents Here -->
                        <form action="{{ route('motorcycles.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <input style="text-transform: uppercase" type="text" class="form-control text-center" placeholder="registration number" aria-label="Vehicle Registration Number" name="registrationNumber" id="registrationNumber">
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto" style="padding-bottom: 5px;">
                                <a type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Add Vehicle</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
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

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Registration</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Displacement</th>
                    <th scope="col">Year</th>
                    <th scope="col">Colour</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($motorcycles as $motorcycle)
                <tr>
                    <th scope="row">{{$motorcycle->registration}}</th>
                    <td>{{$motorcycle->make}}</td>
                    <td>{{$motorcycle->model}}</td>
                    <td>{{$motorcycle->displacement}}CC</td>
                    <td>{{$motorcycle->year}}</td>
                    <td>{{$motorcycle->colour}}</td>
                    <td></td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ URL::to('motorcycles/' . $motorcycle->id) }}">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection