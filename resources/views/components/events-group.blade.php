<div class="events-group">
    <div class="events-group-title">
        <span class="text-gray-500 text-sm tracking-wide uppercase">
            {{ $date }}
        </span>
    </div>

    <div class="events-group-events">
        @foreach($events as $event)
            <div class="event {{ $event->completed ? 'event--completed' : '' }}" style="border-color: {{ $event->label->color }}">
                <div class="flex flex-col text-gray-600 event-details">
                    <span class="event-title">{{ $event->shortTitle }}</span>
                    <div class="flex mt-3 text-xs event-details">
                        <i class="mr-2">@svg('img/clock.svg', 'fill-current')</i>
                        <span class="event-time">{{ $event->start->format('g:i') }} - {{ $event->end->format('g:i A') }}</span>
                        <i class="ml-5 mr-2">@svg('img/pin.svg', 'fill-current')</i>
                        <span class="event-location">{{ $event->location }}</span>
                    </div>
                </div>

                <div class="event-tools">
                    @if(!$event->completed)
                        <a href="{{ route('event.complete', $event->id) }}" data-complete class="event-btn text-gray-600">
                            @svg('img/checked.svg', 'fill-current')
                        </a>
                    @endif

                    <a href="{{ route('event.delete', $event->id) }}" data-delete class="event-btn ml-2 text-gray-600">
                        @svg('img/delete.svg', 'fill-current')
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
