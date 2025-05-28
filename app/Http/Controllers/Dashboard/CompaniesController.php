<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Front\Contact;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve and paginate the latest companies and contacts
        $companies = Company::latest()->paginate(10);
        $contacts = Contact::latest()->paginate(10);

        // Return the view with the retrieved data
        return view('dashboard.companies.index', compact('companies', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create a new empty Company model instance
        $companies = new Company();

        // Return the view for creating a new company with the model instance
        return view('dashboard.companies.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        // Retrieve all request data
        $data = $request->all();

        // Check if a cover image file is present in the request
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                // Store the uploaded file in the 'public' disk under the 'images' directory
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
            }
            // Set the 'cover_image' field in the data array to the stored file path
            $data['cover_image'] = $path;
        }

        // Create a new Company model instance with the data and save it to the database
        Company::create($data);

        // Redirect to the index page with a success message
        return redirect()->route('dashboard.companies.index')->with('success', 'The company has been created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the Company model with the given ID
        $companies = Company::findOrFail($id);

        // Return the view for editing a company with the retrieved model
        return view('dashboard.companies.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        // Retrieve all request data
        $data = $request->all();

        // Store the old cover image path
        $old_image = $company->cover_image;

        // Check if a new cover image file is present in the request
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                // Store the uploaded file in the 'public' disk under the 'images' directory
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
            }
            // Set the 'cover_image' field in the data array to the stored file path
            $data['cover_image'] = $path;
        }

        // Update the Company model with the new data
        $company->update($data);

        // Delete the old cover image if it exists
        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        // Redirect to the index page with an info message
        return redirect()->route('dashboard.companies.index')->with('info', 'The company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Store the old cover image path
        $old_image = $company->cover_image;

        // Attempt to delete the Company model
        if ($company->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        // Delete the old cover image if it exists
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        // Redirect to the index page with a danger message
        return redirect()->route('dashboard.companies.index')->with('danger', 'The company has been deleted');
    }
}
