@extends('layouts.web')

@section('content')
<!-- Link to CSS for styling -->
<link rel="stylesheet" href="{{ url('CSS/events.css') }}">
<div class="events-container">
  <h2 class="page-title">Upcoming Events</h2>

    <!-- Display Search Results or Default Heading -->
    @if(isset($query) && $query)
        <h3>Search Results for: "{{ $query }}"</h3>
    @endif

    <!-- Display Events -->
    <div class="events-grid">
        @if($events->isEmpty())
            <p>No events found.</p>
        @else
            @foreach($events as $event)
                <div class="event-card">
                    <div class="event-image">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}">
                    </div>
                    <div class="event-details">
                        <h2 class="event-title">{{ $event->title }}</h2>
                        <p class="event-date">Date: {{ $event->date }}</p>
                        <p class="event-venue">Venue: {{ $event->venue }}</p>
                        <p class="event-category">Category: {{ $event->category ? $event->category->name : 'No category' }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
