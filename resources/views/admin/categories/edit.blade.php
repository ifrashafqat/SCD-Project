@extends('layouts.admin')
<link rel="stylesheet" href="{{ url(path: 'CSS/admin_event_create.css') }}">

@section('content')
<h1>Edit Category</h1>

<form action="{{ route('admin.categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update Category</button>
</form>
@endsection
