<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Front\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Faker\Factory as Faker;



class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        $contacts = Contact::latest()->paginate(10);

        return view('dashboard.events.index', compact('events', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create a new Event instance for creating a new event
        $event = new Event();

        // Return the view with the new Event instance
        return view('dashboard.events.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
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
            // Create a new Event instance and fill it with data
            $event = new Event($data);

            // Save the event without translations first to get the event_id
            $event->save();

            // Create English translation
            $event->translations()->create([
                'locale' => 'en',
                'title' => $data['title_en'],
                'description' => $data['description_en'],
            ]);

            // Create Arabic translation
            $event->translations()->create([
                'locale' => 'ar',
                'title' => $data['title_ar'],
                'description' => $data['description_ar'],
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('dashboard.events.index')->with('success', 'The event has been created');
        } catch (\Exception $e) {
            // If an error occurs, you can log the error message for debugging
            dd($e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while creating the event.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // Return the view for editing a specific event
        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $data = $request->all();
        $old_image = $event->cover_image;

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
            $event->fill($data);
            $event->save();

            // Update or create English translation
            $en_event = $event->translations()->where('locale', 'en')->firstOrNew(['locale' => 'en']);
            $en_event->title = $data['title_en'];
            $en_event->description = $data['description_en'];
            $en_event->save();

            // Update or create Arabic translation
            $ar_event = $event->translations()->where('locale', 'ar')->firstOrNew(['locale' => 'ar']);
            $ar_event->title = $data['title_ar'];
            $ar_event->description = $data['description_ar'];
            $ar_event->save();

            // Commit the transaction
            DB::commit();

            return redirect()->route('dashboard.events.index')->with('success', 'The event has been updated');
        } catch (Exception $e) {
            // If an error occurs, you can log the error message for debugging
            dd($e->getMessage());

            return redirect()->route('dashboard.events.index')->with('error', 'An error occurred while updating the event.');
        }

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('dashboard.events.index')->with('info', 'The event has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $old_image = $event->cover_image;

        if ($event->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('dashboard.events.index')->with('error', 'The event has been deleted');
    }

    public function checkoutOption(Event $event, Request $request)
    {
        $option = $request->input('option');
        $event->update(['option' => $option]);

        return response()->json(['message' => 'Option updated successfully']);
    }
}
