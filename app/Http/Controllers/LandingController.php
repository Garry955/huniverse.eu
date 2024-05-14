<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function update(Landing $landing, Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'lead' => 'required|min:4|max:255'
        ]);

        $formFields['place'] = $request->place;
        $formFields['url'] = Str::slug($request->name, '-');

        $landing->update($formFields);

        return redirect()->back()->with('message', 'Aloldal sikeresen módosítva.');
    }

    public function create()
    {
        return view('landing.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:4', 'max:255', Rule::unique('landing_pages')],
            'lead' => 'required|min:4|max:255'
        ]);
        $formFields['url'] = Str::slug($request->name, '-');
        $formFields['place'] = $request->place;
        Landing::create($formFields);

        return redirect('/admin/landings')->with('message', 'Aloldal sikeresen létrehozva.');
    }

    public function destroy(Landing $landing)
    {
        if (auth()->user()->is_admin) {
            if ($landing->name !== 'order-success') {
                $landing->delete();
                return redirect('/admin/landings')->with('message', 'Aloldal sikeresen törölve.');
            } else {
                return redirect()->back()->with('message', 'Sikertelen törlés - az aloldal nem törölhető!');
            }
        } else return redirect()->back();
    }

    public function renderPage($url)
    {
        $page = Landing::where('name', $url)->get()[0];

        return view('landing', ['page' => $page]);
    }
}
