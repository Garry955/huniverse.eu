<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Slider;
use App\Models\Landing;

class HomeController extends Controller
{
    //
    public function index()
    {
        $group = Group::latest()->with('products')->first();
        $products = $group->products->take(3);

        return view('home', [
            'group' => $group,
            'products' => $products,
            'sliders' => Slider::latest()->get()
        ]);
    }
}
