@extends('layouts.admin')

@section('content')

    <style>
        /* Page Background */
        body {
            background: linear-gradient(to right, #f5f5dc, #d2b48c, #fffacd);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Page Heading */
        h1 {
            text-align: center;
            color: #8B4513;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        /* Add New Wedding Button */
        a {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #8B4513;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        a:hover {
            background-color: #A0522D;
            transform: scale(1.05);
        }

        /* Table Styling */
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fdf5e6;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #8B4513;
            color: #fff;
            padding: 10px;
            font-size: 1.1em;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        tr:nth-child(odd) {
            background-color: #ffe4b5;
        }

        tr:hover {
            background-color: #ffdead;
        }

        /* Success Message */
        .success-message {
            background-color: #d4edda;
            padding: 15px;
            border-radius: 5px;
            color: #155724;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.1em;
            font-weight: bold;
        }
    </style>

    <h1>Destination Weddings</h1>
    <a href="{{ route('admin.destinationWeddings.create') }}">Add New Wedding</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Bride Name</th>
                <th>Groom Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Event Date</th>
                <th>Season</th>
                <th>Guest Count</th>
                <th>Destination</th>
                <th>Referral</th>
                <th>Specialist</th>
                <th>Additional Details</th>
                <th>Heard About</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weddings as $wedding)
                <tr>
                    <td>{{ $wedding->id }}</td>
                    <td>{{ $wedding->role }}</td>
                    <td>{{ $wedding->bride_name }}</td>
                    <td>{{ $wedding->groom_name }}</td>
                    <td>{{ $wedding->address }}</td>
                    <td>{{ $wedding->phone }}</td>
                    <td>{{ $wedding->email }}</td>
                    <td>{{ $wedding->event_date }}</td>
                    <td>{{ $wedding->season }}</td>
                    <td>{{ $wedding->guest_count }}</td>
                    <td>{{ $wedding->destinations }}</td>
                    <td>{{ $wedding->referral }}</td>
                    <td>{{ $wedding->specialist }}</td>
                    <td>{{ $wedding->additional_details }}</td>
                    <td>{{ $wedding->heard_about }}</td>
                    <td>
                        <a href="{{ route('admin.destinationWeddings.edit', $wedding->id) }}">Edit</a>
                        <form action="{{ route('admin.destinationWeddings.destroy', $wedding->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #ff6347; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(session('success'))
        <div class="success-message">
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif

@endsection
