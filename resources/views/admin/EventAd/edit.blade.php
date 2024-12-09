@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ url(path: 'CSS/admin_event_edit.css') }}">

    <h1 class="page-title">Edit Event</h1>

    <form action="{{ route('admin.EventAd.update', $event) }}" method="POST" enctype="multipart/form-data" class="event-form">
        @csrf
        @method('PUT')

        <!-- Event Title -->
        <div class="form-group">
            <label for="title">Event Title:</label>
            <input type="text" id="title" name="title" value="{{ $event->title }}" required class="form-control">
        </div>

        <!-- Event Image -->
        <div class="form-group">
            <label for="image">Event Image:</label>
            <input type="file" id="image" name="image" class="form-control">
            <p>Current Image:</p>

            <td>
    @if($event->image_path)
        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" width="100" height="100">

    @else
        <p>No Image</p>
    @endif
</td>
           

        <!-- Event Date -->
        <div class="form-group">
            <label for="date">Event Date:</label>
            <input type="date" id="date" name="date" value="{{ $event->date }}" required class="form-control">
        </div>

        <!-- Event Venue -->
        <div class="form-group">
            <label for="venue">Event Venue:</label>
            <input type="text" id="venue" name="venue" value="{{ $event->venue }}" required class="form-control">
        </div>

        <div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ isset($event) && $event->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
@endsection
