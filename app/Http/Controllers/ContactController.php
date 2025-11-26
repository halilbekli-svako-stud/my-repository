<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }
    public function create()
    {
        return view('contacts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
        ]);
        Contact::create($request->only('name', 'phone', 'email', 'address'));
        return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
    }
}
