<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\Event\StoreRequest;
use App\Label;
use App\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

/**
 * Class EventsController
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{
    /**
     * Getting user events, ordering and group them by name.
     * Sorting by start time each day
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
	{
	    $user = Auth::user();
	    $groups = $user->events()
            ->with('label')
            ->orderByDesc('date')
            ->get()
            ->groupBy('date')
            ->map(function($events){
                return $events->sort(function($a, $b){
                    return strtotime($a->start) > strtotime($b->start);
                });
            });

		return view('pages.events.index',[
		    'groups' => $groups
        ]);
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $labels = Label::select('id', 'name', 'color')
            ->orderBy('name')
            ->get();

		return view('pages.events.create',[
		    'labels' => $labels,
            'notify_times' => Notification::$times,
            'notify_types' => Notification::$types
        ]);
	}

    /**
     * Rest of data handle App\Observers\EventObserver
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreRequest $request)
    {
        $user = Auth::user();
        $event = $user->events()->create($request->toArray());

        // Creating event notification
        // Adding minutes from event start
        $notification = $event->notification()->create([
            'type' => $request->notification_type,
            'time' => $event->start->subMinutes($request->notification_time)->format('Y-m-d H:i:00')
        ]);

        return redirect(route('home'));
	}


    /**
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function complete(Event $event)
    {
        $this->authorize('update', $event);
        $event->update(['completed' => 1]);
        return redirect(route('home'));
	}

    /**
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();
        return redirect(route('home'));
    }
}
