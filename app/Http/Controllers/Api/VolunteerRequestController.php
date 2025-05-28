<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\VolunteerRequest;
use App\Models\Front\Volunteer;
use Illuminate\Http\Request;

class VolunteerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Volunteer::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VolunteerRequest $request)
    {
        $data = $request->all();
        $request = Volunteer::create($data);

        return $request;
    }
}
