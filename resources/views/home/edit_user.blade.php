@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>Contract Details</h1>
    <!-- This area is used to dispay errors -->

    <p class="lead text-center">Only authenticated users can access this section.</p>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <strong>Clients</strong>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container">
                        <!-- List of vehicles rented should go here with link to each vehicles details -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">More Info</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row">Name</th>
                                    <td>Mobile</td>
                                    <td>Email</td>
                                    <td>Nationality</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="">Details</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <strong>Addresses</strong>
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
                        <strong>Documents</strong>
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Client documents:
                        1.
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