<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('contact.index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail',
        ]);

        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

        $request->session()->put('contact', $contact);

        $category = Category::find($contact['category_id']);

        return view('contact.confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        $contact = $request->session()->get('contact');

        if (!$contact) {
            return redirect()->route('contact.index');
        }

        Contact::create($contact);

        $request->session()->forget('contact');

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }
}
}
