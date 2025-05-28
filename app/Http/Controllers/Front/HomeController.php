<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Library;
use App\Models\Payments\PaymentMethod;
use App\Models\Program;
use App\Models\Publication;
use App\Models\VisitRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        $query = Event::query();
        $query->where('option', true);
        $events = $query->latest()->paginate(3);

        $programs = Program::latest()->paginate(4);
        return view('Front.home', compact('events', 'programs'));
    }

    public function about()
    {
        return view('Front.about');
    }

    public function principles()
    {
        return view('Front.principles');
    }

    public function objectives()
    {
        return view('Front.objectives');
    }

    public function publications_reports()
    {
        $publications = Publication::latest()->paginate(6);
        return view('Front.publications_reports', compact('publications'));
    }

    public function visualLibrary()
    {
        $libraries = Library::latest()->paginate(1);
        return view('Front.visualLibrary', compact('libraries'));
    }

    public function libraryDetails(Library $library)
    {
        return view('Front.libraryDetails', compact('library'));
    }

    public function events(Request $request)
    {
        $events = $this->eventsSearch($request);

        return view('Front.events', compact('events'));
    }

    public function contact()
    {
        return view('Front.contact');
    }

    public function donate()
    {
        return view('Front.donate', [
            'methods' => PaymentMethod::active()->get()
        ]);
    }

    public function success()
    {
        return view('Front.success');
    }

    public function failed()
    {
        return view('Front.failed');
    }


    public function eventDetails(Event $event)
    {
        $eventId = $event->id;
        $userIp = session()->getId(); // User IP

        $cacheKey = 'last_visit_' . $userIp . '_event_' . $eventId;

        $lastVisitTime = Cache::get($cacheKey);

        if (!$lastVisitTime || now()->diffInMinutes($lastVisitTime) >= 10) {
            $visitRecord = VisitRecord::where('event_id', $eventId)
                ->where('user_identifier', $userIp)
                ->first();

            if (!$visitRecord) {
                $visitRecord = new VisitRecord();
                $visitRecord->event_id = $eventId;
                $visitRecord->user_identifier = $userIp;
                $visitRecord->visit_count = 1; // Initial value
                $visitRecord->save();
            } else {
                $visitRecord->visit_count++;
                $visitRecord->save();
            }

            Cache::put($cacheKey, now(), now()->addMinutes(10));
        } else {
            $visitRecord = VisitRecord::where('event_id', $eventId)
                ->where('user_identifier', $userIp)
                ->first();
        }

        $events = Event::latest()->paginate(4);

        return view('Front.eventDetails', compact('event', 'events', 'visitRecord'));
    }

    public function allEvents(Request $request)
    {

        $events = $this->eventsSearch($request);

        return view('Front.allEvents', compact('events'));
    }


    public function programDetails(Program $program)
    {
        $programs = Program::latest()->paginate(3);
        return view('Front.programDetails', compact('program', 'programs'));
    }

    public function allPrograms()
    {
        $programs = Program::latest()->paginate(12);
        return view('Front.allPrograms', compact('programs'));
    }

    public function eventsSearch(Request $request)
    {
        $query = $request->input('title');

        $eventsEn = Event::whereHas('translations', function ($queryBuilder) use ($query) {
            $queryBuilder->where('locale', 'en')->where('title', 'LIKE', "%$query%");
        });

        $eventsAr = Event::whereHas('translations', function ($queryBuilder) use ($query) {
            $queryBuilder->where('locale', 'ar')->where('title', 'LIKE', "%$query%");
        });

        $eventsEn->where('option', true);
        $eventsAr->where('option', true);

        $events = $eventsEn->union($eventsAr)->latest()->paginate(12);

        return $events;
    }
}
