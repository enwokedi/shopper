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
            View All Documents
        </button>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Client Documents</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <!-- Modal Contents Here -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</a>
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