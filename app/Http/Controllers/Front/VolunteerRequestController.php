<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\VolunteerRequest;
use App\Models\Admin;
use App\Models\Front\Volunteer;
use App\Models\User;
use App\Notifications\Notifications\VolunteerNotification;
use Illuminate\Http\Request;

class VolunteerRequestController extends Controller
{
    public function index()
    {
        return view('Front.volunteerRequest');
    }

    public function store(VolunteerRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            if ($file->isValid()) {
                $path = $file->store('/requests', [
                    'disk' => 'public'
                ]);
            }
            $data['cv'] = $path;
        }

        $request = Volunteer::create($data);

        $admins = User::all();

        foreach ($admins as $admin) {
            $admin->notify(new VolunteerNotification($request));
        }

        return redirect()->route('success');
    }
}
