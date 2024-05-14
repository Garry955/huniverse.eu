<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home', [
            'products' => Product::latest()->where('stock', '>=', 1)->take(3)->get(),
            'sliders' => Slider::latest()->get()
        ]);
    }

    public function aboutUs()
    {
        return view('about_us',  ['page' => Landing::where('name', 'Rólunk')->get()[0]]);
    }
}
