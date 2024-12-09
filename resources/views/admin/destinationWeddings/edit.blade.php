@extends('layouts.admin')

@section('content')


<style>
    body{
        background: linear-gradient(to right, #f5f5dc, #d2b48c, #fffacd);
    }
    .edit-wedding-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: linear-gradient(to right, #f5f5dc, #d2b48c, #fffacd);
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.page-title {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.edit-wedding-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

.form-group input,
.form-group textarea,
.checkbox-group input {
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-group textarea {
    resize: none;
    height: 100px;
}

.checkbox-group {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.checkbox-group label {
    font-size: 0.9rem;
    color: #333;
}

.submit-button {
    background:brown;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.submit-button:hover {
    background-color: #0056b3;
}

</style>
<link rel="stylesheet" href="{{ url('CSS/EditWedding.css') }}">

<div class="edit-wedding-container">
    <h1 class="page-title">Edit Wedding</h1>

    <form class="edit-wedding-form" action="{{ route('admin.destinationWeddings.update', $wedding->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Bride and Groom Names -->
        <div class="form-group">
            <label for="bride_name">Bride Name:</label>
            <input type="text" name="bride_name" value="{{ $wedding->bride_name }}" required>
        </div>

        <div class="form-group">
            <label for="groom_name">Groom Name:</label>
            <input type="text" name="groom_name" value="{{ $wedding->groom_name }}" required>
        </div>

        <!-- Contact Information -->
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="{{ $wedding->phone }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $wedding->email }}" required>
        </div>

        <!-- Wedding Details -->
        <div class="form-group">
            <label for="event_date">Event Date:</label>
            <input type="date" name="event_date" value="{{ $wedding->event_date }}" required>
        </div>

        <div class="form-group">
            <label for="season">Season:</label>
            <input type="text" name="season" value="{{ $wedding->season }}" required>
        </div>

        <!-- Guest Count -->
        <div class="form-group">
            <label for="guest_count">Guest Count:</label>
            <input type="number" name="guest_count" value="{{ $wedding->guest_count }}" required>
        </div>

        <!-- Destinations -->
        <div class="form-group">
            <label>Destinations:</label>
            @foreach($destinations as $destination)
                <div class="checkbox-group">
                    <input type="checkbox" name="destinations[]" value="{{ $destination }}" 
                        {{ in_array($destination, explode(',', $wedding->destinations)) ? 'checked' : '' }}>
                    <label>{{ $destination }}</label>
                </div>
            @endforeach
        </div>

        <!-- Additional Information -->
        <div class="form-group">
            <label for="referral">Referral:</label>
            <input type="text" name="referral" value="{{ $wedding->referral }}">
        </div>

        <div class="form-group">
            <label for="specialist">Wedding Specialist:</label>
            <input type="text" name="specialist" value="{{ $wedding->specialist }}">
        </div>

        <div class="form-group">
            <label for="additional_details">Additional Details:</label>
            <textarea name="additional_details">{{ $wedding->additional_details }}</textarea>
        </div>

        <div class="form-group">
            <label for="heard_about">How did you hear about us?</label>
            <input type="text" name="heard_about" value="{{ $wedding->heard_about }}">
        </div>

        <button type="submit" class="submit-button">Update</button>
    </form>
</div>
@endsection
