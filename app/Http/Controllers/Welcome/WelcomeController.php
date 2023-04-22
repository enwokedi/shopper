<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function HomeMain()
    {
        return view('frontend.index');
    }

    public function BikesForSale()
    {
        return view('frontend.motorcycle-sales');
    }

    public function NewForSale()
    {
        $motorcycles = Category::findOrFail(77)->products()->paginate(9);
        dd($motorcycles);
        return view('frontend.motorcycles-new', compact('motorcycles'));
    }

    public function UsedForSale()
    {
        return view('frontend.motorcycles-used');
    }

    public function RentBike()
    {
        return view('frontend.rentals-motorcycles');
    }

    public function RentalDetails()
    {
        return view('frontend.rentals-details');
    }

    public function DemoDetails()
    {
        return view('frontend.rentals-hondapcx125');
    }

    public function RentInformation()
    {
        return view('frontend.rentals-information');
    }

    public function GetServices()
    {
        return view('frontend.services');
    }

    public function Repairs()
    {
        return view('frontend.service-repairs');
    }

    public function ServiceBike()
    {
        return view('frontend.service-motorcycle');
    }

    public function ServiceMot()
    {
        return view('frontend.service-mot');
    }

    public function AccidentClaim()
    {
        return view('frontend.accidents');
    }

    public function GetProducts()
    {
        return view('frontend.shop');
    }

    public function GpsTracker()
    {
        return view('frontend.gps-tracker');
    }

    public function SpareParts()
    {
        return view('frontend.spare-parts');
    }

    public function AboutMethod()
    {
        return view('frontend.about_page');
    }

    public function ContactMethod()
    {
        return view('contact');
    }
}
