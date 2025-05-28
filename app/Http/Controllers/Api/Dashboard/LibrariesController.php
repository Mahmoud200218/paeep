<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryRequest;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LibrariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Library::paginate();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(LibraryRequest $request)
    {

        $data = $request->all();

        if ($request->hasFile('cover_image')) {

            $file = $request->file('cover_image');

            if ($file->isValid()) {
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
                $data['cover_image'] = $path;
            }
        }

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

            return $library;
        } catch (\Exception $e) {
            $e->getMessage();
        }
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

            return $library;
        } catch (\Exception $e) {
            $e->getMessage();
        }

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
    {
        $old_image = $library->cover_image;

        $library->delete();

        // Delete the old cover image if it exists
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        return [
            "message" => "Library has been deleted successfully"
        ];
    }
}
