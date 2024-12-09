
@extends('layouts.web') 
@section('content')
<link rel="stylesheet" href="{{ url(path: 'CSS/confirm.css') }}">

  <div class="full_container">



    <h1 class="confirm_2">
      Booking Confirmed!
    </h1>
    <p class="confirm">
      We'll Send You A Confirmation Email Soon..

    </p>

  </div>

  @endsection

<!-- 
  public function confirm(Request $request)
  {
      $validated = $request->validate([
          'destinations' => 'required|array|min:1', // Ensure at least one destination is selected
          'destinations.*' => 'string', // Each selected destination must be a string
      ]);
  
      // Process the destinations
      $selectedDestinations = $request->input('destinations');
      // You can save or process them as needed
  } -->
  