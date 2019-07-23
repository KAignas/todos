<?php

namespace App\Observers;

use App\Event;
use Carbon\Carbon;

class EventObserver
{
    /**
     * Handle the event "creating" event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function creating(Event $event)
    {
        $event->date   = Carbon::parse($event->date)->format('Y-m-d');
        $event->start  = Carbon::parse($event->start)->format('H:i');
        $event->end    = Carbon::parse($event->end)->format('H:i');
    }
}
