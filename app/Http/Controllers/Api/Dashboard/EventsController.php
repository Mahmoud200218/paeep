<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index()
    {
        return Event::paginate();
    }

    public function store(EventRequest $request)
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
            $event = new Event($data);

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

            DB::commit();

            return $event;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

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

            return $event;
        } catch (Exception $e) {
            return $e->getMessage();
        }

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }
    }

    public function destroy(Event $event)
    {
        $old_image = $event->cover_image;

        $event->delete();

        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }

        return [
            "message" => "Event has been deleted successfully"
        ];
    }
}
