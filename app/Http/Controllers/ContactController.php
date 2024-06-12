<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('contacts.index');
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|string|email|max:255',
        ]);

        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->company = $validatedData['company'];
        $contact->phone = $validatedData['phone'];
        $contact->email = $validatedData['email'];
        $contact->user_id = Auth::id();
        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully.');
    }

    public function showContacts(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search');
            $contactsQuery = Contact::where('user_id', Auth::id())
                                    ->where(function ($query) use ($search) {
                                        $query->where('name', 'like', '%' . $search . '%')
                                              ->orWhere('company', 'like', '%' . $search . '%')
                                              ->orWhere('phone', 'like', '%' . $search . '%')
                                              ->orWhere('email', 'like', '%' . $search . '%');
                                    });

            $contacts = $contactsQuery->paginate(10);

            return view('contacts.search_results', compact('contacts'))->render();
        }

        return redirect()->route('contacts.index');
    }

    public function deleteContact($id)
    {
        $contact = Contact::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
