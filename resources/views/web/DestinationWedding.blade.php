@extends('layouts.web') 
@section('content')
<link rel="stylesheet" href="{{ url(path: 'CSS/DestinationWedding.css') }}">

<div class="full_container">
    <div class="dest_container">
        <img src="{{ asset('images/images_des/destination.jpg') }}" alt="">
    </div>

    <h1 class="story">Destination Wedding</h1>
    <div class="line"></div>

    <div class="container_2 work space">
        <div class="text-content">
            <h1>01</h1>
            <h2>Thailand</h2>
            <p>Thailand is a place of mythical beauty, wonder, and excitement. From the gorgeous beach resorts of the Andaman Coast to golden Buddhist temples, elephant jungle tours, and amazing Thai culinary delights, the exhilaration never ends. Plan your wedding in Thailand to experience all this and more.</p>
            <p>If you've got breathtaking beaches in mind, head south to Phuket and Koh Samui where dazzling scenery is absolutely unbeatable.</p>
        </div>
        <div class="image-content">
            <img src="{{ asset('images/images_des/thailand.jpg') }}" alt="Thailand Image">
        </div>
    </div>

    <div class="container_2 work space">
        <div class="text-content">
            <h1>02</h1>
            <h2>Sri Lanka</h2>
            <p>Sri Lanka offers a stunning array of locations, from beautiful beaches to lush tea plantations and historical landmarks. Your wedding can take place in a serene beachside resort or a breathtaking hill country estate.</p>
        </div>
        <div class="image-content">
            <img src="{{ asset('images/images_des/srilanka.jpg') }}" alt="Sri Lanka Image">
        </div>
    </div>

    <div class="container_2 work space">
        <div class="text-content">
            <h1>03</h1>
            <h2>Turkey</h2>
            <p>Turkey's rich history, stunning landscapes, and incredible cuisine make it an ideal destination for a wedding. From the iconic city of Istanbul to the idyllic beaches of Antalya, there's something for everyone.</p>
        </div>
        <div class="image-content">
            <img src="{{ asset('images/images_des/turkey.jpg') }}" alt="Turkey Image">
        </div>
    </div>

    <div class="container space">
        <h1>Let's Get Started</h1>
        <p>By providing us with a few details, we can start the process of pairing you with a Certified Destination Wedding Specialist whose experience best matches your preferences!</p>
        <h2>Please tell us about yourself</h2>
        <p>Knowing more about you will help us cater our services to your needs.</p>

        <form action="{{ isset($wedding) ? route('destinationWeddings.update', $wedding->id) : (request()->is('frontend') ? route('destinationWeddings.frontendStore') : route('destinationWeddings.store')) }}" method="POST">
    @csrf
    @if(isset($wedding))
        @method('PUT')  <!-- Only include this for update -->
    @endif

    <label for="role">You are a…</label>
<select id="role" name="role" required>
    <option value="bride" {{ old('role', $wedding->role ?? '') == 'bride' ? 'selected' : '' }}>Beautiful Bride</option>
    <option value="groom" {{ old('role', $wedding->role ?? '') == 'groom' ? 'selected' : '' }}>Lucky Guy</option>
    <option value="parents" {{ old('role', $wedding->role ?? '') == 'parents' ? 'selected' : '' }}>Proud Parents</option>
    <option value="friend" {{ old('role', $wedding->role ?? '') == 'friend' ? 'selected' : '' }}>Friend</option>
</select>

    <label for="bride_name">Name of the Bride:</label>
    <input type="text" id="bride_name" name="bride_name" value="{{ old('bride_name', $wedding->bride_name ?? '') }}" required>

    <label for="groom_name">Name of the Groom:</label>
    <input type="text" id="groom_name" name="groom_name" value="{{ old('groom_name', $wedding->groom_name ?? '') }}" required>

    <h2>Just a bit about where you live</h2>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="{{ old('address', $wedding->address ?? '') }}" required>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" value="{{ old('phone', $wedding->phone ?? '') }}" required>

    <label for="email">Your Email (required):</label>
    <input type="email" id="email" name="email" value="{{ old('email', $wedding->email ?? '') }}" required>

    <h2>Tell us about your wedding vision</h2>
    <label for="event_date">What is your estimated event date?</label>
    <input type="date" id="event_date" name="event_date" value="{{ old('event_date', $wedding->event_date ?? '') }}">

    <label for="season">Or, do you have a particular season in mind?</label>
    <input type="text" id="season" name="season" value="{{ old('season', $wedding->season ?? '') }}">

    <label for="guest_count">How many people are you expecting to celebrate with you?</label>
    <input type="number" id="guest_count" name="guest_count" value="{{ old('guest_count', $wedding->guest_count ?? '') }}" required>

    <h2>Where can we take you?</h2>
<label>Which destination interests you? (Please choose one!)</label>
<div>
    <input type="radio" id="thailand" name="destinations" value="Thailand" {{ old('destinations', $wedding->destination ?? '') == 'Thailand' ? 'checked' : '' }}>
    <label for="thailand">Thailand</label>
</div>
<div>
    <input type="radio" id="turkey" name="destinations" value="Turkey" {{ old('destinations', $wedding->destination ?? '') == 'Turkey' ? 'checked' : '' }}>
    <label for="turkey">Turkey</label>
</div>
<div>
    <input type="radio" id="other" name="destinations" value="Other" {{ old('destinations', $wedding->destination ?? '') == 'Other' ? 'checked' : '' }}>
    <label for="other">Other</label>
</div>



    <h2>Almost there!</h2>
    <label for="referral">Did someone refer you to our services?</label>
    <input type="text" id="referral" name="referral" value="{{ old('referral', $wedding->referral ?? '') }}">

    <label for="specialist">Is there a specific Certified Destination Wedding Specialist you would like to work with?</label>
    <input type="text" id="specialist" name="specialist" value="{{ old('specialist', $wedding->specialist ?? '') }}">

    <label for="additional_details">Any additional details you’d like your Specialist to know?</label>
    <textarea id="additional_details" name="additional_details">{{ old('additional_details', $wedding->additional_details ?? '') }}</textarea>

    <label for="heard_about">How did you hear about us?</label>
    <input type="text" id="heard_about" name="heard_about" value="{{ old('heard_about', $wedding->heard_about ?? '') }}">

    <button  type="submit" >Submit </button>
</form>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const destinationCheckboxes = document.querySelectorAll('input[name="destinations[]"]');
        
        destinationCheckboxes.forEach(checkbox => {
            checkbox.addEventListener("change", () => {
                const checkedCount = Array.from(destinationCheckboxes).filter(chk => chk.checked).length;

                if (checkedCount > 1) {
                    alert("You can select only one destination.");
                    checkbox.checked = false; // Uncheck the current checkbox
                }
            });
        });
    });
</script>

@endsection
