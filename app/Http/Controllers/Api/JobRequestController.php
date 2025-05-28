<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\JobRequest;
use App\Models\Front\Job;
use Illuminate\Http\Request;

class JobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Job::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $data = $request->all();
        $request = Job::create($data);

        return $request;
    }

}
