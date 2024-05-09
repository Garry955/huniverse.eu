<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function destroy()
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('/')->with('message', $user->name . ' profilja sikeresen törölve lett.');
    }

    public function edit()
    {

        $orders = Order::where([
            'customer_email' => auth()->user()->email
        ])->latest()->take(5)->get();

        return view('user.edit')->with(['orders' => $orders]);
    }

    public function update(Request $request)
    {

        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'current_password' => 'required|current_password',
            'new_password' => 'confirmed|different:current_password'
        ]);

        if ($request->filled('new_password')) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => bcrypt($request->new_password)
            ]);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('user.edit')->with('message', 'Sikeres adatmódosítás!');
    }
}
