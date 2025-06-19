<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $page_title = __('pages.contact');

        return view('site.contact', compact('page_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            Mail::to(setting('contact', 'email'))->send(new ContactMail($request->only('name', 'email', 'title', 'message')));

            return back()->with('success', __('messages.success.contact.message_sent_successfully'));
        } catch (\Throwable$th) {
            return back()->with('error', __('messages.error.contact.something_went_error'));

        }
    }
}
