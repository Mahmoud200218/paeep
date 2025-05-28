<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProgramsController extends Controller
{
    public function index()
    {
        return Program::paginate();
    }

    public function store(ProgramRequest $request)
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

        // Begin a database transaction
        DB::beginTransaction();

        try {
            $program = new Program([
                'cover_image' => $data['cover_image'] ?? '',
            ]);

            $program->save();

            $program->translations()->create([
                'locale' => 'en',
                'title' => $data['title_en'],
                'description' => $data['description_en'],
            ]);

            $program->translations()->create([
                'locale' => 'ar',
                'title' => $data['title_ar'],
                'description' => $data['description_ar'],
            ]);

            DB::commit();

            return $program;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(ProgramRequest $request, Program $program)
    {
        $data = $request->all();
        $old_image = $program->cover_image;

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
            $program->fill($data);
            $program->save();

            // Update or create English translation
            $en_translations = $program->translations()->where('locale', 'en')->firstOrNew(['locale' => 'en']);
            $en_translations->title = $data['title_en'];
            $en_translations->description = $data['description_en'];
            $en_translations->save();

            // Update or create Arabic translation
            $ar_translations = $program->translations()->where('locale', 'ar')->firstOrNew(['locale' => 'ar']);
            $ar_translations->title = $data['title_ar'];
            $ar_translations->description = $data['description_ar'];
            $ar_translations->save();

            // Commit the transaction
            DB::commit();

            return $program;
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }
    }

    public function destroy(Program $program)
    {
        $old_image = $program->cover_image;

        $program->delete();

        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        return [
            'message' => 'Program has been deleted successfully'
        ];

    }
}
