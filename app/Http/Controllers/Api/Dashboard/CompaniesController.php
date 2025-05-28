<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function index()
    {
        return Company::paginate();
    }

    public function store(CompanyRequest $request)
    {
        // Retrieve all request data
        $data = $request->all();

        // Check if a cover image file is present in the request
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
            }

            $data['cover_image'] = $path;
        }

        return Company::create($data);
    }

    public function update(CompanyRequest $request, Company $company)
    {

        $data = $request->all();

        $old_image = $company->cover_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $path;
        }

        $company->update($data);

        return $company;

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }
    }

    public function destroy(Company $company)
    {
        $old_image = $company->cover_image;

        $company->delete();

        // Delete the old cover image if it exists
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        return [
            'message' => 'Company has been deleted successfully'
        ];
    }
}
