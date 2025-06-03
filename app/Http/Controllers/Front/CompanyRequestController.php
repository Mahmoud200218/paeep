<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CompanyRequest;
use App\Models\Admin;
use App\Models\Front\CompaniesRequest;
use App\Models\User;
use App\Notifications\Notifications\CompanyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CompanyRequestController extends Controller
{
    /**
     * Display the company request form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Return the company request form view
        return view('Front.companyRequest');
    }

    /**
     * Handle the submission of the company request form.
     *
     * @param  \App\Http\Requests\Front\CompanyRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request)
    {
        // Retrieve all validated input data
        $data = $request->all();

        // Check and store the registration certificate file if uploaded
        if ($request->hasFile('registration_certificate')) {
            $file = $request->file('registration_certificate');

            if ($file->isValid()) {
                // Save the file in 'public/requests' and get the path
                $path = $file->store('/requests', [
                    'disk' => 'public'
                ]);
                // Store the path in the data array
                $data['registration_certificate'] = $path;
            }
        }

        // Check and store the organizational structure file if uploaded
        if ($request->hasFile('structure_organisationnelle')) {
            $file = $request->file('structure_organisationnelle');

            if ($file->isValid()) {
                // Save the file in 'public/requests' and get the path
                $path = $file->store('/requests', [
                    'disk' => 'public'
                ]);
                // Store the path in the data array
                $data['structure_organisationnelle'] = $path;
            }
        }

        // Create a new company request record in the database
        $company = CompaniesRequest::create($data);

        // Notify all users (admins) about the new company request
        $admin = User::all();

        foreach ($admin as $admin) {
            $admin->notify(new CompanyNotification($company));
        }

        // Redirect to the success page after submission
        return redirect()->route('success');
    }
}
