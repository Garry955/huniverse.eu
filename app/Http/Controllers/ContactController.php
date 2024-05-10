<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($formFields);

        Mail::send(
            'components.email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ),
            function ($message) use ($formFields) {
                $message->from($formFields['email']);
                $message->to('infoHuniverse@gmail.com', 'Admin')->subject('Kapcsolatfelvétel');
            }
        );

        return redirect()->back()->with('message', 'Sikeres üzenetküldés.');
    }

    public function contactList()
    {
        return view('admin.contact_list', ['contacts' => Contact::latest()->paginate(10)]);
    }

    public function destroy(Contact $contact)
    {
        if (auth()->user()->is_admin) {
            $contact->delete();
            return redirect()->back()->with('message', 'Üzenet sikeresen törölve.');
        } else {
            return redirect()->back();
        }
    }
}
