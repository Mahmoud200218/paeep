<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Front\CompaniesRequest;
use App\Models\Front\Contact;
use Illuminate\Support\Facades\Storage;

class CompaniesRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve and paginate the latest companies requests and contacts
        $companies = CompaniesRequest::latest()->paginate(10);
        $contacts = Contact::latest()->paginate(10);

        // Return the view with the retrieved data
        return view('dashboard.companies_requests.index', compact('companies', 'contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the CompaniesRequest model with the given ID
        $companiesRequest = CompaniesRequest::findOrFail($id);

        // Attempt to delete the CompaniesRequest model
        if ($companiesRequest->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        // Delete the old registration certificate and structure organisationnelle images
        $old_image_certificate = $companiesRequest->registration_certificate;
        $old_image_structure = $companiesRequest->structure_organisationnelle;

        if ($old_image_certificate) {
            Storage::disk('public')->delete($old_image_certificate);
        }

        if ($old_image_structure) {
            Storage::disk('public')->delete($old_image_structure);
        }

        // Redirect to the index page with a danger message
        return redirect()->route('dashboard.companies.requests')->with('danger', 'The company request was deleted successfully');
    }
}
