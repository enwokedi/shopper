@extends('layouts.app-master')

@section('content')
<div class="bg-light p-5 rounded">
    @auth
    <h1>Rentals</h1>

    <table class="table">
        <thead>
            @foreach ($users as $user)
            <tr>
                <th scope="col">Name: {{ $user->first_name }} {{ $user->last_name }}</th>
                <th scope="col"> M: {{ $user->phone_number }}</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            @endforeach
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
            <tr>
                <th scope="row">{{ $rental->id }}</th>
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