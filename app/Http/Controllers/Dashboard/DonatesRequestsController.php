<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Front\Contact;
use App\Models\Front\Donate;
use Illuminate\Http\Request;

class DonatesRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve and paginate the latest contacts and donate requests
        $contacts = Contact::latest()->paginate();
        $donates = Donate::latest()->paginate();

        // Return the view with the retrieved data
        return view('dashboard.donates_requests.index', compact('donates', 'contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donate $donate)
    {
        // Attempt to delete the Donate model
        if ($donate->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        // Redirect to the index page with a danger message
        return redirect()->route('dashboard.donates.index')->with('danger', 'The donate request was deleted successfully');
    }
}
