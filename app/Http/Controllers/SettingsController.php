<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    // Display all settings
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    // Show the form for creating a new setting
    public function create()
    {
        return view('admin.settings.create');
    }

    // Store a newly created setting
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'value' => 'required|string',
        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index')->with('success', 'Setting added successfully.');
    }

    // Show the form for editing a specific setting
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    // Update a specific setting
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string',
            'value' => 'required|string',
        ]);

        $setting = Setting::findOrFail($id);
        $setting->update($request->all());

        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

    // Delete a specific setting
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully.');
    }

    // Display all destinations dynamically
    public function destinations()
    {
        $destinations = Setting::ofType('destination')->get();
        return view('admin.settings.destinations', compact('destinations'));
    }

    //yaha say

    public function confirm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'destinations' => 'required|array|min:1', // At least one destination must be selected
            'destinations.*' => 'string', // Each selected destination must be a string
        ]);

        // Get the selected destinations
        $selectedDestinations = $request->input('destinations');
        
        // If you're storing them as settings or another structure, you can process it like this:
        foreach ($selectedDestinations as $destination) {
            // Store the selected destination in the Setting model (assuming it's stored this way)
            Setting::create([
                'type' => 'destination', // Use 'destination' as the type
                'value' => $destination, // Store the value of each selected destination
            ]);
        }

        // Redirect after processing
        return redirect()->route('thank-you');  // Change to your desired redirect
    }
}
