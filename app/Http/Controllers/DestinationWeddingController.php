<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinationWedding; // Import the model

class DestinationWeddingController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $weddings = DestinationWedding::all(); // Fetch all records from the database
        return view('admin.destinationWeddings.index', compact('weddings'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.destinationWeddings.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)

    {
        // dd($request->all());
        // Validate the incoming request
        $validated = $request->validate([
            
            'role' => 'required|string',
            'address' => 'nullable|string|max:255',
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'event_date' => 'required|date',
            'season' => 'nullable|string|max:255',
            'guest_count' => 'required|integer',
            'destinations' => 'required|array|min:1',
            'destinations.*' => 'in:Thailand,Turkey,Sri Lanka',
            'referral' => 'nullable|string|max:255',
            'specialist' => 'nullable|string|max:255',
            'additional_details' => 'nullable|string',
            'heard_about' => 'nullable|string|max:255',
        ]);
        
        // Create a new Wedding record
        $wedding = new DestinationWedding();
        $wedding->role = $validated['role'];
        $wedding->address = $validated['address'] ?? null;  // Save the address field
        $wedding->bride_name = $validated['bride_name'];
        $wedding->groom_name = $validated['groom_name'];
        $wedding->phone = $validated['phone'];
        $wedding->email = $validated['email'];
        $wedding->event_date = $validated['event_date'];
        $wedding->season = $validated['season'];
        $wedding->guest_count = $validated['guest_count'];
        $wedding->destinations = json_encode($validated['destinations']);
        $wedding->referral = $validated['referral'] ?? null;
        $wedding->specialist = $validated['specialist'] ?? null;
        $wedding->additional_details = $validated['additional_details'] ?? null;
        $wedding->heard_about = $validated['heard_about'] ?? null;
    
        // Save the wedding to the database
        $wedding->save();
    
        // Redirect with success message
        return redirect()->route('admin.destinationWeddings.index')
                         ->with('success', 'New wedding added successfully!');
    }
    

    

    // Show the form for editing the specified resource
    // public function edit($id)
    // {
    //     $wedding = DestinationWedding::findOrFail($id); 
    //     return view('admin.destinationWeddings.edit', compact('wedding'));
    // }

    public function edit($id)
{
    // Fetch the wedding by ID
    $wedding = DestinationWedding::find($id);

    // Define an array of possible destinations (or fetch from database if dynamic)
    $destinations = ['Thailand', 'Sri Lanka', 'Turkey']; // Example static destinations
    
    // Return the edit view with the wedding and destinations data
    return view('admin.destinationWeddings.edit', compact('wedding', 'destinations'));
}


    

    // Update the specified resource in storage
    public function update(Request $request, $id)
{
    // Find the wedding by ID
    $wedding = DestinationWedding::findOrFail($id);

    // Validate the incoming request data (you can customize this based on your requirements)
    $validated = $request->validate([
        'bride_name' => 'required|string|max:255',
        'groom_name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'event_date' => 'required|date',
        'season' => 'nullable|string|max:255',
        'guest_count' => 'required|integer',
        'destinations' => 'array|min:1',
        'destinations.*' => 'in:Thailand,Turkey,Sri Lanka',
        'referral' => 'nullable|string|max:255',
        'specialist' => 'nullable|string|max:255',
        'additional_details' => 'nullable|string',
        'heard_about' => 'nullable|string|max:255',
    ]
    

);

    // Update the wedding details
    $wedding->bride_name = $request->input('bride_name');
    $wedding->groom_name = $request->input('groom_name');
    $wedding->phone = $request->input('phone');
    $wedding->email = $request->input('email');
    $wedding->event_date = $request->input('event_date');
    $wedding->season = $request->input('season');
    $wedding->guest_count = $request->input('guest_count');
    $wedding->destinations = implode(',', $request->input('destinations', []));  // Ensure destinations is stored as a comma-separated string
    $wedding->referral = $request->input('referral');
    $wedding->specialist = $request->input('specialist');
    $wedding->additional_details = $request->input('additional_details');
    $wedding->heard_about = $request->input('heard_about');

    // Save the updated wedding record
    $wedding->save();

    // Redirect back with a success message
    // return redirect()->route('admin.destinationWeddings.index')->with('success', 'Wedding details updated successfully!');
    return redirect()->route('admin.destinationWeddings.index')->with('success', 'Wedding details updated successfully!');
}




    // Remove the specified resource from storage
    public function destroy($id)
    {
        $wedding = DestinationWedding::findOrFail($id); // Find the record by ID
        $wedding->delete(); // Delete the record

        return redirect()->route('admin.destinationWeddings.index')->with('success', 'Record deleted successfully!');
    }
    
}
