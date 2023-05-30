@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>Clients</h1>
    <!-- Page Button Group -->
    <div class="container-fluid">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-success" href="{{ URL::to('users/create') }}">Create New User</a>
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
        </ul>
    </div>
    @endif
    <!-- This area is used to dispay errors -->

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                    <th scope="col">More Info</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->first_name}} {{$user->last_name}}</th>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->email}}</td>
                    <td></td>
                    <td>
                        <a class="btn btn-outline-success" href="{{ URL::to('users/' . $user->id) }}">Details</a>
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