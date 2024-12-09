@extends('layouts.web') 
@section('content')
<link rel="stylesheet" href="{{ url(path: 'CSS/welcome.css') }}">
    <div class="full_container">
        <div class="carousel">
            <div class="slides">
                <div class="slide">
                    <img src="{{ asset('images/pic.jpg') }}" alt="Slide 1">
                    <div class="text-overlay">
                        <h1>WE DESIGN YOUR DREAMS</h1>
                        <p>At Dawat we take your event as our personal venture because we believe Your Story is Ours.</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/pic9.jpg') }}" alt="Slide 2">
                    <div class="text-overlay">
                        <h1>TURN YOUR IDEAS INTO REALITY</h1>
                        <p>Your vision, our expertise, creating memorable moments together.</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/pic5.jpg') }}" alt="Slide 3">
                    <div class="text-overlay">
                        <h1>YOUR EVENT, OUR PASSION</h1>
                        <p>From concept to creation, let us bring your celebration to life.</p>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <h1 class="story">Your Story Is Ours</h1>
        <div class="image-container">
            <img src="{{ asset('images/pic5.jpg') }}" class="rounded float-start" alt="...">
            <img src="{{ asset('images/pic16.jpg') }}" class="rounded float-end" alt="...">
            <img src="{{ asset('images/pic11.jpg') }}" alt="Image 4">
            <img src="{{ asset('images/pic9.jpg') }}" alt="Image 1">
            <img src="{{ asset('images/pic14.jpg') }}" alt="Image 2">
            <img src="{{ asset('images/pic15.jpg') }}" alt="Image 3">
        </div>

        <hr>
        <div class="logo_container">
            <img src="{{ asset('images/logo1.png') }}" alt="">
            <div>
                <p class="para_1">What Is Mannam</p>
                <li class="para">Complete Event Management Company</li>
                <li class="para">Wedding And Party Caterers</li>
                <li class="para">Timeline And Task Organizer</li>
                <li class="para">Customizable Themes And Decor Options</li>
                <li class="para">Active Planning And Schedule</li>
            </div>
        </div>
        <hr>       
    </div>
@endsection