@extends('layouts.app-master')

@section('content')
<div class="bg-light p-5 rounded">
    @auth
    <h1>{{ $count_rentals }} Rentals</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Motorcycle ID</th>
                <th scope="col">Start Date</th>
                <th scope="col">Price / Weekly</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
            <tr>
                <th scope="row">{{ $rental->id }}</th>
                <td>{{ $rental->user_id }}</td>
                <td>{{ $rental->motorcycle_id }}</td>
                <td>{{ $rental->start_date }}</td>
                <td>£{{ $rental->weekly_cost }}.00</td>
                <td><button type="button" class="btn btn-danger">Details</button></td>
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