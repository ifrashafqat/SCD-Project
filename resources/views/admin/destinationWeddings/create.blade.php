@extends('layouts.admin')

@section('content')

<style>
    /* General Styling */
    body {
        background: linear-gradient(to right, #f5f5dc, #d2b48c, #fffacd);
        font-family: Arial, sans-serif;
    }

    .container {
        background-color: #fdf5e6;
        border-radius: 10px;
        padding: 20px 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 40px auto;
    }

    h1 {
        color: #8B4513;
        font-size: 2.5em;
        margin-bottom: 20px;
        text-align: center;
    }

    hr {
        border: none;
        height: 1px;
        background-color: #8B4513;
        margin-bottom: 20px;
    }

    /* Form Styling */
    .form-group label {
        font-weight: bold;
        color: #8B4513;
    }

    .form-control, .form-check-input {
        border: 1px solid #d2b48c;
        border-radius: 5px;
        padding: 10px;
    }

    .form-check-label {
        color: #8B4513;
    }

    .form-group input:focus, 
    .form-group textarea:focus, 
    .form-group select:focus {
        outline: none;
        border-color: #8B4513;
        box-shadow: 0 0 5px rgba(139, 69, 19, 0.5);
    }

    /* Error Alert Styling */
    .alert {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
    }

    .alert li {
        list-style-type: disc;
    }

    /* Buttons Styling */
    .btn-primary {
        background-color: #8B4513;
        border: none;
        padding: 10px 20px;
        font-size: 1.1em;
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: block;
        margin: 20px auto;
    }

    .btn-primary:hover {
        background-color: #A0522D;
        transform: scale(1.05);
    }

    /* Manage Weddings Button */
    .btn-manage-weddings {
        background-color: #8B4513;
        color: #fff;
        padding: 12px 25px;
        font-size: 1em;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 25px;
        border: none;
        transition: all 0.3s ease;
        display: inline-block;
        text-align: center;
        margin-bottom: 20px;
        text-decoration: none;
    }

    .btn-manage-weddings:hover {
        background-color: #A0522D;
        color: #fff;
        transform: translateY(-3px);
    }
</style>

<div class="container mt-5">
    <h1 class="text-center">Add New Destination Wedding Entry</h1>
    <hr>

    <!-- Manage Weddings Button -->
    <a href="{{ route('admin.destinationWeddings.index') }}" class="btn-manage-weddings">
        Manage Weddings
    </a>

    <!-- Display Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.destinationWeddings.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="role">Role</label>
            <select id="role" name="role" class="form-control" required>
                <option value="bride">Beautiful Bride</option>
                <option value="groom">Lucky Guy</option>
                <option value="parents">Proud Parents</option>
                <option value="friend">Friend</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="bride_name">Name of the Bride</label>
            <input type="text" id="bride_name" name="bride_name" class="form-control" placeholder="Enter bride's name" required>
        </div>

        <div class="form-group mb-3">
            <label for="groom_name">Name of the Groom</label>
            <input type="text" id="groom_name" name="groom_name" class="form-control" placeholder="Enter groom's name" required>
        </div>

        <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Enter address" required>
        </div>

        <div class="form-group mb-3">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter phone number" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address" required>
        </div>

        <div class="form-group mb-3">
            <label for="event_date">Event Date</label>
            <input type="date" id="event_date" name="event_date" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="season">Preferred Season</label>
            <input type="text" id="season" name="season" class="form-control" placeholder="Enter preferred season">
        </div>

        <div class="form-group mb-3">
            <label for="guest_count">Number of Guests</label>
            <input type="number" id="guest_count" name="guest_count" class="form-control" placeholder="Enter number of guests" required>
        </div>

        <div class="form-group mb-3">
            <label>Destinations</label><br>
            <div class="form-check">
                <input type="checkbox" id="thailand" name="destinations[]" value="Thailand" class="form-check-input">
                <label for="thailand" class="form-check-label">Thailand</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="sri_lanka" name="destinations[]" value="Sri Lanka" class="form-check-input">
                <label for="sri_lanka" class="form-check-label">Sri Lanka</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="turkey" name="destinations[]" value="Turkey" class="form-check-input">
                <label for="turkey" class="form-check-label">Turkey</label>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="referral">Referred By</label>
            <input type="text" id="referral" name="referral" class="form-control" placeholder="Who referred you?">
        </div>

        <div class="form-group mb-3">
            <label for="specialist">Specialist Name</label>
            <input type="text" id="specialist" name="specialist" class="form-control" placeholder="Enter specialist name">
        </div>

        <div class="form-group mb-3">
            <label for="additional_details">Additional Details</label>
            <textarea id="additional_details" name="additional_details" class="form-control" rows="4" placeholder="Enter additional details here"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="heard_about">How did you hear about us?</label>
            <input type="text" id="heard_about" name="heard_about" class="form-control" placeholder="Enter source">
        </div>

        <button type="submit" class="btn-primary">Submit</button>
    </form>
</div>

@endsection
