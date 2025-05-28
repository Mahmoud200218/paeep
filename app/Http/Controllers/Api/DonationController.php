<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\DonateRequest;
use App\Models\Front\Donate;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Donate::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonateRequest $request)
    {
        $data = $request->all();
        $request = Donate::create($data);

        return $request;
    }
}
