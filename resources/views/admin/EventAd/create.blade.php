@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ url(path: 'CSS/admin_event_create.css') }}">

    <h1 class="page-title">Add New Event</h1>

    <!-- Display any validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.EventAd.store') }}" method="POST" enctype="multipart/form-data" class="event-form">
        @csrf

        <div class="form-group">
            <label for="title">Event Title:</label>
            <input type="text" id="title" name="title" required class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Event Image:</label>
            <input type="file" id="image" name="image" required class="form-control">
        </div>

        <div class="form-group">
            <label for="date">Event Date:</label>
            <input type="date" id="date" name="date" required class="form-control">
        </div>

        <div class="form-group">
            <label for="venue">Event Venue:</label>
            <input type="text" id="venue" name="venue" required class="form-control">
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
    <a href="{{ route('admin.categories.create') }}" class="btn btn-info mt-2">Add New Category</a>
</div>


        <button type="submit" class="btn btn-primary">Add Event</button>
    </form>
@endsection
