<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Models\Admin;
use App\Models\Front\Contact;
use App\Models\User;
use App\Notifications\ContactUsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $data = $request->all();

        // Checkout input 
        $policy = $request->has('policy') ? 1 : 0;
        $data['policy'] = $policy;

        $contact = Contact::create($data);

        $admins = User::all();

        foreach ($admins as $admin) {
            $admin->notify(new ContactUsNotification($contact));
        }

        return redirect()->route('success');
    }

    public function destroy(Contact $contact)
    {
        if ($contact->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        return redirect()->route('dashboard.donates')->with('success', 'Delete message successfully');
    }
}
