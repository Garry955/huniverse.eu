<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function index()
    {
        return view('slider.index', ['sliders' => Slider::latest()->get()]);
    }

    public function create()
    {
        return view('slider.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'slider_image' => 'mimes:jpeg,png,jpg,gif',
            'lead' => 'required|min:6|max:255',
            'text' => 'min:4|max:255'
        ]);

        //File upload
        if ($request->hasFile('slider_image')) {
            $formFields['image'] = $request->file('slider_image')->hashName();
        }

        //File upload
        if ($request->hasFile('slider_image')) {
            $request->file('slider_image')->store('/slider/', 'public');
        }

        Slider::create($formFields);

        return redirect('/admin/sliders')->with('message', 'Dia sikeresen hozzáadva.');
    }

    public function destroy(Slider $slider)
    {
        if (auth()->user()->is_admin) {
            $slider->delete();

            return redirect('/admin/sliders')->with('message', 'Dia sikeresen törölve.');
        } else {
            return redirect()->back();
        }
    }

    public function edit(Slider $slider)
    {
        return view('slider.edit', ['slider' => $slider]);
    }

    public function update(Slider $slider, Request $request)
    {

        $formFields = $request->validate([
            'slider_image' => 'mimes:jpeg,png,jpg,gif',
            'lead' => 'required|min:6|max:255',
            'text' => 'min:4|max:255'
        ]);

        //File upload
        if ($request->hasFile('slider_image')) {
            $formFields['image'] = $request->file('slider_image')->hashName();
            $request->file('slider_image')->store('/slider/', 'public');
            if (Storage::exists('public/slider/' . $slider->image)) {
                Storage::delete('public/slider/' . $slider->image);
            }
        }

        $slider->update($formFields);

        return redirect('/admin/sliders')->with('message', 'Dia sikeresen hozzáadva.');
    }
}
