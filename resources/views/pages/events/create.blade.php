@extends('layout.main')
@section('title')
    Add New
@endsection
@section('navigation')
    <a href="{{ route('home') }}" class="nav-btn nav-btn--close">
        @svg('img/close.svg')
    </a>

    <h3 class="nav-title">Add New</h3>

    <button class="nav-btn nav-btn--submit">
        @svg('img/checked.svg')
    </button>
@endsection

@section('content')
    <form action="{{ route('event.create') }}" method="post" autocomplete="off" spellcheck="false" class="event-create-form">
        @component('components.form.errors',[
             'errors' => $errors
            ])@endcomponent
        @csrf
        <div class="w-full bg-gray-100 py-5 px-5">
            <div class="form-input mb-5">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-input mb-5">
                <label for="description">Description</label>
                <textarea name="description">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="w-full py-5 px-5">
            <div class="form-input mb-5">
                <label for="date">Date</label>
                <input type="text" name="date" value="{{ old('date') }}">
            </div>

            <div class="flex mb-5">
                <div class="form-input mr-2 w-1/2">
                    <label for="start">From</label>
                    <input type="text" name="start" value="{{ old('start') }}">
                </div>

                <div class="form-input w-1/2">
                    <label for="end">To</label>
                    <input type="text" name="end" value="{{ old('end') }}">
                </div>
            </div>

            <div class="form-input mb-5">
                <label for="location">Location</label>
                <input type="text" name="location">
            </div>

            <div class="flex items-end mb-5">
                <div class="form-input mr-2 w-full">
                    <label for="notification_time">Notify</label>
                    <select name="notification_time">
                        @foreach($notify_times as $name => $minutes)
                            <option value="{{ $minutes }}" {{ old('notification_time') == $minutes ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-input mr-2 w-25">
                    <select name="notification_type">
                        @foreach($notify_types as $type)
                            <option value="{{ $type }}" {{ old('notification_type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-input">
                <label for="label_id">Label</label>
                <select name="label_id">
                    @foreach($labels as $label)
                        <option value="{{ $label->id }}" {{ $label->id == old('label') ? 'selected' : '' }} data-data='{!! $label->toJson() !!}'>{{ $label->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
@endsection
