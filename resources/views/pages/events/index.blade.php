@extends('layout.main')
@section('navigation')
    @include('layout.navigation')
@endsection

@section('content')
    @if($groups->count())
        <div class="events">
            @foreach($groups as $date => $events)
                @component('components.events-group',[
                    'date'      => \Carbon\Carbon::parse($events->first()->date)->format('D, M d'),
                    'events'    => $events
                ])@endcomponent
            @endforeach
        </div>
    @else
        <p class="w-full text-center text-gray-500 px-8 py-8">No events</p><br>
    @endif
@endsection
