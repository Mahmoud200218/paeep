<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryRequest;
use App\Models\Front\Contact;
use App\Models\Library;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LibrariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();

        // Retrieve and paginate the latest libraries and contacts
        $libraries = Library::latest()->paginate(10);
        $contacts = Contact::latest()->paginate(10);

        // Return the view with the retrieved data
        return view('dashboard.libraries.index', compact('libraries', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create a new Library instance
        $library = new Library();

        // Return the view for creating a library with the library instance
        return view('dashboard.libraries.create', compact('library'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LibraryRequest $request)
    {

        // Get the request data
        $data = $request->all();

        // Handle the cover image file upload
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
                $data['cover_image'] = $path;
            }
        }

        // Create a new Library instance with the provided data
        $library = new Library([
            'cover_image' => $data['cover_image'] ?? '',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Save the library without translations first to get the library_id
            $library->save();

            // Create English translation
            $library->translations()->create([
                'locale' => 'en',
                'title' => $data['title_en'],
                'description' => $data['description_en'],
            ]);

            // Create Arabic translation
            $library->translations()->create([
                'locale' => 'ar',
                'title' => $data['title_ar'],
                'description' => $data['description_ar'],
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect with a success message
            return redirect()->route('dashboard.libraries.index')->with('success', 'The library has been created');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            dd($e->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while creating the library.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Library $library)
    {
        return view('dashboard.libraries.edit', compact('library'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LibraryRequest $request, Library $library)
    {
        $data = $request->all();
        $old_image = $library->cover_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
                $data['cover_image'] = $path;
            }
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
            $library->fill($data);
            $library->save();

            // Update or create English translation
            $en_library = $library->translations()->where('locale', 'en')->firstOrNew(['locale' => 'en']);
            $en_library->title = $data['title_en'];
            $en_library->description = $data['description_en'];
            $en_library->save();

            // Update or create Arabic translation
            $ar_library = $library->translations()->where('locale', 'ar')->firstOrNew(['locale' => 'ar']);
            $ar_library->title = $data['title_ar'];
            $ar_library->description = $data['description_ar'];
            $ar_library->save();

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            dd($e->getMessage());
        }

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        // Redirect with an info message
        return redirect()->route('dashboard.libraries.index')->with('info', 'The library has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
    {
        $old_image = $library->cover_image;

        // Delete the library record
        if ($library->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        // Delete the old cover image if it exists
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        // Redirect with a danger message
        return redirect()->route('dashboard.libraries.index')->with('danger', 'The library has been deleted');
    }
}
