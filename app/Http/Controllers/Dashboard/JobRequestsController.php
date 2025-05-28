<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Front\Contact;
use App\Models\Front\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve and paginate the latest jobs and contacts
        $jobs = Job::latest()->paginate(10);
        $contacts = Contact::latest()->paginate(10);

        // Return the view with the retrieved data
        return view('dashboard.job_requests.index', compact('jobs', 'contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $old_image = $job->cv;

        // Attempt to delete the job
        if ($job->delete()) {
            // If successful, return a JSON response with success true
            return response()->json(['success' => true]);
        } else {
            // If deletion fails, return a JSON response with success false
            return response()->json(['success' => false]);
        }
        
        // Delete the old image from storage if it exists
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        // Redirect to the jobs index page with a danger message
        return redirect()->route('dashboard.jobs.index')->with('danger', 'The job was deleted successfully');
    }
}
