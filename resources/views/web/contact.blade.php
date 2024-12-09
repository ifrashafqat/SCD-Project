@extends('layouts.web')
@section('content')
<!-- <link rel="stylesheet" href="{{url(path: 'CSS/contact.css')}}"> -->
<link rel="stylesheet" href="{{ asset('CSS/contact.css') }}">


<!-- Page Heading -->
<div class="page-heading">Contact Us</div>

<!-- Contact Container -->
<div class="contact-container">

  <!-- Contact Form -->
  <div class="contact-form">
    <h2>Get in Touch</h2>
    <form action="#" method="post">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Your Name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Your Email" required>

      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" required>

      <label for="message">Message</label>
      <textarea id="message" name="message" rows="4" placeholder="Your Message" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </div>

  <!-- Contact Information -->
  <div class="contact-info">
    <h2>Contact Information</h2>
    <p><strong>Address:</strong> 123 Event Lane, Cityville, Country</p>
    <p><strong>Phone:</strong> +123 456 7890</p>
    <p><strong>Email:</strong> contact@mannam.com</p>
    <p>For any queries related to our event management services, feel free to reach out. We are here to make your events memorable!</p>
  </div>

</div>

<!-- Map Placeholder -->
<div class="map-container">
  [Google Map Placeholder]
</div>

</div>

@endsection
