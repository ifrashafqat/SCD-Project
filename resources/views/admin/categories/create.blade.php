@extends('layouts.admin')
<link rel="stylesheet" href="{{ url(path: 'CSS/admin_event_create.css') }}">

@section('content')
<h1>Add New Category</h1>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Category</button>
</form>
@endsection
