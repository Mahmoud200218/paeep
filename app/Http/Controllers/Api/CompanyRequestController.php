<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CompanyRequest;
use App\Models\Front\CompaniesRequest;

class CompanyRequestController extends Controller
{
    public function index()
    {
        return CompaniesRequest::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->all();
        $request = CompaniesRequest::create($data);

        return $request;
    }
}
