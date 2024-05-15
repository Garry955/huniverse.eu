<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Slider;
use App\Models\Landing;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index()
    {
        $group = Group::latest()->with('products')->first();
        if ($group) {
            $products = $group->products->take(3);
        } else {
            $products = Product::latest()->take(3)->get();
        }

        return view('home', [
            'group' => $group,
            'products' => $products,
            'sliders' => Slider::latest()->get()
        ]);
    }
}
