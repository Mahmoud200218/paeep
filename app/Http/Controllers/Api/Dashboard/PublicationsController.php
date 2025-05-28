<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationReportRequest;
use App\Models\Publication;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Publication::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationReportRequest $request)
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

            return $publication;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationReportRequest $request, Publication $publication)
    {
        $data = $request->all();
        $old_image = $publication->cover_image;

        if ($request->hasFile('cover_image')) {

            $file = $request->file('cover_image');

            if ($file->isValid()) {
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

            return $publication;
        } catch (Exception $e) {
            return $e->getMessage();
        }

        // Delete the old cover image if a new one is uploaded
        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $old_image = $publication->cover_image;

        $publication->delete();

        // Delete the old cover image
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        return [
            "message" => "Publication has been deleted successfully"
        ];
    }
}
