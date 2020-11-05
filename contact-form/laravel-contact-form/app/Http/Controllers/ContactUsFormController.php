<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsFormController extends Controller
{
    public function createForm(Request $request)
    {
        return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject' => 'required',
            'message' => 'required'
        ]);

        //  Store data in database
        'App\Http\Controllers\Contact'::create($request->all());

        // 
        return back()->with('success', 'Thank you for your trust! Your message has been send. Our team wil do they best to respond you as soon as possible.');
    }
}
