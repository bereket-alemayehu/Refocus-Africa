<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{


    public function index()
    {
        $contacts = Contact::all();
        return ContactResource::collection($contacts);
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'proffession' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20|unique:contacts,phone',
            'suggestion' => 'nullable|max:1000',
            'education' => 'required|string|max:255',
        ]);

        $contact = Contact::create($validated);

        return response()->json(['data' => $contact]);
    }
}
