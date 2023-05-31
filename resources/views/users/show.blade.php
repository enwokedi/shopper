@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>{{$user->first_name}} {{$user->last_name}}</h1>
    <a href="{{  $user->phone_number }}">{{$user->phone_number}}</a><br>
    <a href="{{  $user->email }}">{{$user->email}}</a>
    <p>{{$user->street_address}}, {{$user->street_address_plus}}, {{$user->city}} {{$user->post_code}}</p>

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
</div>
<div class="container-fluid">
    <div class="container-fluid">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-success" href="{{ URL()->previous() }}">Back</a>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-success" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit Client</a>
        </div>
    </div>
</div>
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <h4>Documents</h4>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col">
                                <p>
                                    <strong>Nationality: </strong>{{ $user->nationality }}<br>
                                    <strong>Driving Licence: </strong>{{ $user->driving_licence }}<br>
                                </p>
                            </div>
                            <div class="col">
                                <!-- <a class="btn btn-outline-dark" href="{{ URL::to('/upload-files/' . $user->id) }}">Add Documents</a> -->
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('/file-dl-front/' . $user->id) }}">Licence Front</a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('/file-dl-back/' . $user->id) }}">Licence Back</a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('/file-pocbt/' . $user->id) }}">CBT</a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('/file-poid/' . $user->id) }}">ID</a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('/file-poadd/' . $user->id) }}">Proof of Address</a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('/file-poins/' . $user->id) }}">Insurance</a>
                        </div>

                        <!-- Button trigger modal -->
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
                                        @foreach ($documents as $document)
                                        @if($document->name)
                                        <img src="{{ asset('storage/uploads/'.$document->name) }}" style="width:100%;">
                                        @else
                                        <span>No image found!</span>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row align-items-start">
                        <div class="container">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Document Type</th>
                                            <th scope="col">Reg #</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $document)
                                        <tr>
                                            <td>{{ $document->name }}</td>
                                            <td>{{ $document->document_type }}</td>
                                            <td>Registration ???</td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a class="btn btn-outline-success" href="/remove-upload/{{$document->id}}">View</a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a class="btn btn-outline-danger" href="/remove-upload/{{$document->id}}">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                <h4>Motorcycles</h4>
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="accordion-body">
                    <div class="container-fluid">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('/motorcycles-for-rent/' . $user->id) }}">Add Motorcycle</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container text-center">
                    <div class="container">
                        <!-- List of vehicles rented should go here with link to each vehicles details -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Registration</th>
                                    <th scope="col">Make</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">CC</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Colour</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($motorcycles as $motorcycle)
                                <tr>
                                    <td>{{$motorcycle->registration}}</th>
                                    <td>{{$motorcycle->make}}</th>
                                    <td>{{$motorcycle->model}}</th>
                                    <td>{{$motorcycle->engine}}</th>
                                    <td>{{$motorcycle->year}}</th>
                                    <td>{{$motorcycle->colour}}</th>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-outline-success" href="{{ URL::to('motorcycles/' . $motorcycle->id) }}">Details</a>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-outline-success" href="{{ URL::to('remove-rental/' . $motorcycle->id) }}">Remove</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapse0Four">
                <h4>Payments</h4>
            </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="container">
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-outline-success" href="{{ URL::to('/create-rental/' . $user->id) }}">Rental Deposit</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Reg</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Received</th>
                                <th scope="col">Outstanding</th>
                                <th scope="col">Payment Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <td>{{$payment->registration}}</th>
                                <td class="text-capitalize">{{$payment->payment_type}}</th>
                                <td>£{{$payment->amount}}</th>
                                <td>{{$payment->payment_due_date}}</th>
                                <td>£{{$payment->received}}</th>
                                <td class="text-danger">£{{$payment->outstanding}}</td>
                                <td>{{$payment->payment_date}}</th>
                                <td>
                                    <a class="btn btn-outline-success" href="{{ URL::to('payments/' . $payment->id . '/edit') }}">Update Payment</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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