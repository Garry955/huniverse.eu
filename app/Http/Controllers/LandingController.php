<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index', ['landings' => Landing::latest()->get()]);
    }

    public function edit(Landing $landing)
    {
        return view('landing.edit', ['landing' => $landing]);
    }
}
