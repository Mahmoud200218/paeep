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
    public function index()
    {
        return view('Front.companyRequest');
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('registration_certificate')) {
            $file = $request->file('registration_certificate');
            if ($file->isValid()) {
                $path = $file->store('/requests', [
                    'disk' => 'public'
                ]);
                $data['registration_certificate'] = $path;
            }
        }

        if ($request->hasFile('structure_organisationnelle')) {
            $file = $request->file('structure_organisationnelle');
            if ($file->isValid()) {
                $path = $file->store('/requests', [
                    'disk' => 'public'
                ]);
                $data['structure_organisationnelle'] = $path;
            }
        }

        $company = CompaniesRequest::create($data);

        $admin = User::all();

        foreach ($admin as $admin) {
            $admin->notify(new CompanyNotification($company));
        }

        return redirect()->route('success');
    }
}
