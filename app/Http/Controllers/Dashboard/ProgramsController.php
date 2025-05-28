<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Models\Front\Contact;
use App\Models\Program;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the latest programs and contacts, and paginate them
        $programs = Program::latest()->paginate(10);
        $contacts = Contact::latest()->paginate(10);

        // Return the view with programs and contacts
        return view('dashboard.programs.index', compact('programs', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create a new Program instance
        $program = new Program();

        // Return the view for creating a program with the program instance
        return view('dashboard.programs.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramRequest $request)
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

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Create a new Program instance and fill it with data
            $program = new Program([
                'cover_image' => $data['cover_image'] ?? '',
            ]);

            // Save the program
            $program->save();

            // Create English translation
            $program->translations()->create([
                'locale' => 'en',
                'title' => $data['title_en'],
                'description' => $data['description_en'],
            ]);

            // Create Arabic translation
            $program->translations()->create([
                'locale' => 'ar',
                'title' => $data['title_ar'],
                'description' => $data['description_ar'],
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('dashboard.programs.index')->with('success', 'The program has been created');
        } catch (Exception $e) {
            // Handle exceptions, you can log the error message for debugging
            dd($e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while creating the program.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('dashboard.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
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

            return redirect()->route('dashboard.programs.index')->with('success', 'The program has been updated');
        } catch (Exception $e) {
            // Handle exceptions, you can log the error message for debugging
            dd($e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating the program.');
        }

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('dashboard.programs.index')->with('info', 'The program has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $old_image = $program->cover_image;

        if ($program->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('dashboard.programs.index')->with('danger', 'The program has been deleted');
    }
}
