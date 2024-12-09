
@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ url(path: 'CSS/admin_event_index.css') }}">

<h1>Manage Events</h1>
<a href="{{ route('admin.EventAd.create') }}" class="btn btn-primary">Add New Event</a>

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Category</th>

            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($events as $event)
        <tr>
            <td>{{ $event->title }}</td>

            <td>
    @if($event->image_path)
        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" width="100" height="100">

    @else
        <p>No Image</p>
    @endif
</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->venue }}</td>
            

            <td>{{ $event->category->name ?? 'No Category' }}</td>
            <td>
                <a href="{{ route('admin.EventAd.edit', $event) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.EventAd.destroy', $event) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
