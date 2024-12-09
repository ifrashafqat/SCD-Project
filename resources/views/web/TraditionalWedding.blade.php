@extends('layouts.web') 

<link rel="stylesheet" href="{{ url(path: 'CSS/TraditionalWedding.css') }}">


@section('content')
<div class="full_container">
    <div class="carousel">
        <div class="slides">
            <div class="slide">
                <img src="{{ asset('images/images_trad/traditional_1.jpg') }}" alt="Slide 1">
                <div class="text-overlay">
                    <h1>WE DESIGN YOUR DREAMS</h1>
                    <p>At Dawat we take your event as our personal venture because we believe Your Story is Ours.</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('images/images_trad/traditional_2.jpg') }}" alt="Slide 2">
                <div class="text-overlay">
                    <h1>TURN YOUR IDEAS INTO REALITY</h1>
                    <p>Your vision, our expertise, creating memorable moments together.</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('images/images_trad/traditional_3.jpg') }}" alt="Slide 3">
                <div class="text-overlay">
                    <h1>YOUR EVENT, OUR PASSION</h1>
                    <p>From concept to creation, let us bring your celebration to life.</p>
                </div>
            </div>
        </div>
    </div>

    <h1 class="story">Traditional Wedding</h1>

    <hr>
</div>
@endsection
