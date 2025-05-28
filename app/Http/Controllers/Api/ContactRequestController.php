<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Models\Front\Contact;

class ContactRequestController extends Controller
{
    public function index()
    {
        return Contact::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $data = $request->all();
        $request = Contact::create($data);

        return $request;
    }
}
