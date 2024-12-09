@extends('layouts.admin')
<link rel="stylesheet" href="{{ url(path: 'CSS/admin_event_create.css') }}">

@section('content')
<h1>Manage Categories</h1>

<a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
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
