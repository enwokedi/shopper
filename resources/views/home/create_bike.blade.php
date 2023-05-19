@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>Add Motorcycle</h1>
    <p class="lead">Only authenticated users can access this section.</p>
    <form>
        <select class="selectpicker" id="category">

            <option value="1"> Fruit </option>

            <option value="2"> Animal</option>

        </select>

        <select class="selectpicker" id="items">
            <!--added this just to keep default value selcted-->
            <option class="default" value="0"> --Select-- </option>
            <option class="1" value="1"> Banana </option>

            <option class="1" value="2"> Apple </option>

            <option class="2" value="3"> Cat </option>

            <option class="2" value="4"> Dog</option>

        </select>
    </form>

    <form>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
                <option selected>Select Make</option>
                <option class="honda" value="honda">Honda</option>
                <option class="yamaha" value="yamaha">Yamaha</option>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
                <option selected>Select Model</option>
                <option class="honda" value="honda">Vision</option>
                <option class="honda" value="honda">PCX</option>
                <option class="honda" value="honda">SH</option>
                <option class="honda" value="honda">Forza</option>
                <option class="yamaha" value="yamaha">NMAX</option>
                <option class="yamaha" value="yamaha">XMAX</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection