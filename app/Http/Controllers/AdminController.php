<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    // Authenticate admin
    public function authenticate(Request $request)
    {
        //Validate fields
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Attempt user login
        if (auth()->attempt($formFields) && auth()->user()->is_admin) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard')->with('message', 'Sikeres bejelentkezés.');
        };

        //Show error attempt failed, only after password input
        return back()->withErrors(['password' => 'Hibás felhasználónév/jelszó.'])->onlyInput('password');
    }

    public function dashboard()
    {
        $products = Product::latest()->paginate(10);

        return view('admin.dashboard', ['products' => $products]);
    }

    public function logout(Request $request)
    {
        //Logout user
        auth()->logout();
        //Reset session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //Redirect
        return redirect('/admin')->with('message', 'Sikeres kijelentkezés!');
    }

    public function listProducts()
    {
        return view('admin.products_list');
    }
}
