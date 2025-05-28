<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Front\Contact;
use App\Models\Front\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VolunteerRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the latest volunteers and contacts, and paginate them
        $volunteers = Volunteer::latest()->paginate(10);
        $contacts = Contact::latest()->paginate(10);

        // Return the view with volunteers and contacts
        return view('dashboard.volunteer_requests.index', compact('volunteers', 'contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        // Get the path to the old CV image
        $old_image = $volunteer->cv;

        // Delete the volunteer record
        if ($volunteer->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        // Delete the old CV image from storage
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        // Redirect to the volunteers index page with a success message
        return redirect()->route('dashboard.volunteers.index')->with('danger', 'The volunteer was deleted successfully');
    }
}
