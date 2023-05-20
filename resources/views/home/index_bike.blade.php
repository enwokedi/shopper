@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>Motorcycle Admin</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Start Date</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Dispacement</th>
                <th scope="col">Year</th>
                <th scope="col">Colour</th>
                <th scope="col">Registration</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($motorcycles as $motorcycle)
            <tr>
                <td>{{$motorcycle->rental_start_date}}</td>
                <td>{{$motorcycle->make}}</td>
                <td>{{$motorcycle->model}}</td>
                <td>{{$motorcycle->displacement}}CC</td>
                <td>{{$motorcycle->year}}</td>
                <td>{{$motorcycle->colour}}</td>
                <th scope="row">{{$motorcycle->registration}}</th>
                <td>
                    <!-- edit this rental (uses the edit method found at GET /rentals/{id} -->
                    <a class="btn btn-small btn-info" href="#">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection