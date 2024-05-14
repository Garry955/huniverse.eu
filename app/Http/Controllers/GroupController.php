<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function destroy(Group $group)
    {
        if (auth()->user()->is_admin) {
            $group->delete();
            return redirect()->back()->with('message', 'Termékcsoport sikeresen törölve.');
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $formFields = $request->validate(['name' => 'required|max:255']);

        if (Group::create($formFields)) {
            return redirect()->back()->with(['message' => 'Termékcsoport sikeresen hozzáadva.']);
        }
    }
}
