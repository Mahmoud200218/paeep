<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\JobRequest;
use App\Models\Admin;
use App\Models\Front\Job;
use App\Models\User;
use App\Notifications\Notifications\JobNotification;
use Illuminate\Http\Request;

class JobRequestController extends Controller
{
    public function index()
    {
        return view('Front.jobRequest');
    }

    public function store(JobRequest $request)
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

        $job = Job::create($data);

        $admins = User::all();

        foreach ($admins as $admin) {
            $admin->notify(new JobNotification($job));
        }

        return redirect()->route('success');
    }

    public function destroy(Job $job)
    { {
            $job->delete();
        }
    }
}
