<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(RegisterRequest $request)
    {

        //Validation
        $formFields = $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);
        $formFields['phone'] = $request->phone;
        $formFields['address'] = $request->address;
        // Bcrypt password
        $formFields['password'] = bcrypt($formFields['password']);
        //Store user in db
        $user = User::create($formFields);

        //Log in user
        auth()->login($user);
        // redirect to homepage
        return redirect('/')->with('message', 'Sikeres regisztráció!');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        //Validate fields
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Attempt user login
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You have been logged in');
        }
        //Show error attempt failed, only after password input
        return back()->withErrors(['password_s' => 'Invalid credentials'])->onlyInput('password_s');
    }


    // Logout user
    public function logout(Request $request)
    {
        //Logout user
        auth()->logout();
        //Reset session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //Redirect
        return redirect('/')->with('message', 'Sikeres kijelentkezés!');
    }
}
