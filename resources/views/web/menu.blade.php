@extends('layouts.web') 

<link rel="stylesheet" href="{{ url(path: 'CSS/menu.css') }}">


@section('content')
<div class="full_container">

    <!-- Page Heading -->
    <div class="page-heading">Mannam Food Collection</div>

    <!-- Slideshow -->
    <div class="slideshow-container">
        <img class="slide" src="{{ asset('images/images_menu/slide3.jpg') }}" alt="Food Slide 1">
        <img class="slide" src="{{ asset('images/images_menu/slide2.jpg') }}" alt="Food Slide 2">
        <img class="slide" src="{{ asset('images/images_menu/slide1.jpg') }}" alt="Food Slide 3">
    </div>

    <!-- Menu Items Container -->
    <div class="menu-container">

        <!-- Food Item 1 -->
        <div class="menu-item">
            <img src="{{ asset('images/images_menu/slide1.jpg') }}" alt="Dish 1">
            <div class="food-name">Gourmet Salad</div>
            <div class="food-description">A refreshing mix of greens, nuts, and cheese, perfect to start any meal.</div>
        </div>

        <!-- Food Item 2 -->
        <div class="menu-item">
            <img src="{{ asset('images/images_menu/slide2.jpg') }}" alt="Dish 2">
            <div class="food-name">Herb Grilled Chicken</div>
            <div class="food-description">Succulent chicken marinated in herbs and grilled to perfection.</div>
        </div>

        <!-- Food Item 3 -->
        <div class="menu-item">
            <img src="{{ asset('images/images_menu/slide3.jpg') }}" alt="Dish 3">
            <div class="food-name">Pasta Primavera</div>
            <div class="food-description">A delightful blend of pasta and fresh vegetables in a light sauce.</div>
        </div>

        <!-- Food Item 4 -->
        <div class="menu-item">
            <img src="{{ asset('images/images_menu/slide1.jpg') }}" alt="Dish 4">
            <div class="food-name">Seafood Platter</div>
            <div class="food-description">A lavish platter of fresh seafood, perfect for seafood lovers.</div>
        </div>

        <!-- Food Item 5 -->
        <div class="menu-item">
            <img src="{{ asset('images/images_menu/slide2.jpg') }}"alt="Dish 5">
            <div class="food-name">Chocolate Fondant</div>
            <div class="food-description">A rich and gooey chocolate dessert that melts in your mouth.</div>
        </div>

    </div>
</div>
@endsection
