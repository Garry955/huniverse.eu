<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        if (request()->query()) {
            $group = Group::latest()?->where('name', 'like', '%' . request()->query()["search"] . '%')->first();
            if ($group) {
                $products = Product::latest()->with('group')
                    ->where('group_id', $group->id)->paginate(9);
            } else {
                $products = Product::latest()->with('group')->paginate(10);
            }
        } else {
            $products = Product::latest()->with('group')->paginate(10);
        }
        $groups = Group::latest()->get();

        return view('admin.dashboard', ['products' => $products, 'groups' => $groups]);
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

    public function listUsers()
    {

        return view('admin.user_list', ['users' => User::latest()->get()]);
    }

    public function deleteUser(User $user)
    {
        if (auth()->user()->id != $user->id && auth()->user()->is_admin) {
            $user->delete();
            return redirect('/admin/users')->with('message', $user->name . ' - felhasználó sikeresen törölve.');
        } else {
            return redirect()->back()->with('message', 'Sikertelen törlés.');
        }
    }

    public function editUser(User $user)
    {
        return view('admin.edit_user', ['user' => $user]);
    }

    public function updateUser(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ]
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->back()->with('message', 'Sikeres adatmódosítás!');
    }

    public function createUser()
    {
        return view('admin.create_user');
    }

    public function storeUser(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:6',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users'),
            ],
            'password' => 'required|confirmed|min:6',
        ]);
        $formFields['phone'] = $request->phone;
        $formFields['address'] = $request->address;
        if ($request->is_admin) {
            $formFields['is_admin'] = true;
        }
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);

        return redirect('/admin/users')->with('message', 'Felhasználó hozzáadva!');
    }
}
