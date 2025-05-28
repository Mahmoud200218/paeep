<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationReportRequest;
use App\Models\Front\Contact;
use App\Models\Publication;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the latest publications and contacts, and paginate them
        $publications = Publication::latest()->paginate(10);
        $contacts = Contact::latest()->paginate(10);

        // Return the view with publications and contacts
        return view('dashboard.publications.index', compact('publications', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create a new Publication instance
        $publication = new Publication();

        // Return the view for creating a publication with the publication instance
        return view('dashboard.publications.create', compact('publication'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationReportRequest $request)
    {
        // Get the request data
        $data = $request->all();

        // Check if a cover image file has been uploaded
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                // Store the cover image and update the data array
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
                $data['cover_image'] = $path;
            }
        }

        // Create a new Publication instance with the cover image data
        $publication = new Publication([
            'cover_image' => $data['cover_image'] ?? '',
        ]);

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Save the publication
            $publication->save();

            // Create English translation
            $publication->translations()->create([
                'locale' => 'en',
                'title' => $data['title_en'],
            ]);

            // Create Arabic translation
            $publication->translations()->create([
                'locale' => 'ar',
                'title' => $data['title_ar'],
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('dashboard.publications.index')->with('success', 'The publication has been created');
        } catch (Exception $e) {
            // Handle exceptions, you can log the error message for debugging
            dd($e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while creating the publication.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        return view('dashboard.publications.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationReportRequest $request, Publication $publication)
    {
        $data = $request->all();
        $old_image = $publication->cover_image;

        // Check if a cover image file has been uploaded
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                // Store the cover image and update the data array
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
                $data['cover_image'] = $path;
            }
        }

        // Begin a database transaction
        DB::beginTransaction();

        try {
            $publication->fill($data);
            $publication->save();

            // Update or create English translation
            $en_translation = $publication->translations()->where('locale', 'en')->firstOrNew(['locale' => 'en']);
            $en_translation->title = $data['title_en'];
            $en_translation->save();

            // Update or create Arabic translation
            $ar_translation = $publication->translations()->where('locale', 'ar')->firstOrNew(['locale' => 'ar']);
            $ar_translation->title = $data['title_ar'];
            $ar_translation->save();

            // Commit the transaction
            DB::commit();
        } catch (Exception $e) {
            // Handle exceptions, you can log the error message for debugging
            dd($e->getMessage());
        }

        // Delete the old cover image if a new one is uploaded
        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('dashboard.publications.index')->with('info', 'The publication has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $old_image = $publication->cover_image;

        if ($publication->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        // Delete the old cover image
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('dashboard.publications.index')->with('danger', 'The publication has been deleted');
    }
}
