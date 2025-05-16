<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{


    public function index()
    {
        $contacct = Contact::all();
        return ContactResource::collection($contacct);
    }
    public function store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'proffession' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20|unique:contacts,phone',
            'suggestion' => 'nullable|max:1000',
            'education' => 'required|string|max:255',
        ])->validate();

        $contact = Contact::create($validated);

        return response()->json(['data' => $contact]);
    }
}
