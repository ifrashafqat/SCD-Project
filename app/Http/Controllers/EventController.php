<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Category;



class EventController extends Controller
{
    // Frontend: Display Events
    public function index()
{
    
    dd('Route was triggereds!');

    $events = Event::with('category')->get();
    return view('web.events', compact('events')); // Pass the $events variable to the view
}




    // Admin: Show Events
    public function adminIndex()
    {
        $events = Event::all();
        return view('admin.EventAd.index', compact('events'));
    }

    // Show Create Form
    public function create()
    {
        $categories = Category::all();
    return view('admin.EventAd.create', compact('categories'));
    }

    // Store Event
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:4096',
            'date' => 'required|date',
            'venue' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
        $imagePath = $request->file('image')->store('images', 'public'); // Ensure 'public' disk is used
    
        // Handle the image file
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('events', 'public');
            
            
        } else {
            // Handle error when image is invalid or not uploaded
            return back()->withErrors(['image' => 'The uploaded file is invalid.'])->withInput();
        }
    
        // Create event in the database
        Event::create([
            'title' => $validated['title'],
            'image_path' => $imagePath,
            'date' => $validated['date'],
            'venue' => $validated['venue'],
            'category_id' => $validated['category_id'],
        ]);
    
        return redirect()->route('admin.EventAd.index')->with('success', 'Event created successfully.');
    }
    

    

    // Edit Event
    public function edit($id)
    {
         // Fetch the event by its ID
    $event = Event::findOrFail($id);

    // Fetch all categories to populate the dropdown
    $categories = Category::all();
        return view('admin.EventAd.edit', compact('event','categories'));
    }

    // Update Event
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'date' => 'required|date',
            'venue' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Update image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image_path = $imagePath;
        }

        $event->update([
            'title' => $validated['title'],
            'date' => $validated['date'],
            'venue' => $validated['venue'],
        ]);

        return redirect()->route('admin.EventAd.index')->with('success', 'Event updated successfully.');
    }

    // Delete Event
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.EventAd.index')->with('success', 'Event deleted successfully.');
    }
    // Show a single event (Frontend)
public function show(Event $event)
{
    // dd('Route was triggereds!');
    return view('web.events', compact('event')); // Create a new view for event details
    
}

public function search(Request $request)
{
    $query = $request->input('query');

    // Search by event title or category name
    $events = Event::with('category')
        ->where('title', 'LIKE', "%{$query}%")
        ->orWhereHas('category', function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })
        ->get();

    // Return the view with filtered events and the search query
    return view('web.events', compact('events', 'query'));
}


}