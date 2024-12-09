<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DestinationWeddingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;


Route::post('/destination-wedding/submit', [DestinationWeddingController::class, 'store'])->name('confirm');

Route::resource('admin/destinationWeddings', DestinationWeddingController::class);


Route::get('/events/search', [EventController::class, 'search'])->name('events.search');


// In routes/web.php

Route::resource('admin/categories', CategoryController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});


// Route::get('/welcome', [WebController::class, 'welcome'])->name('Web.welcome');
Route::get('/', [WebController::class, 'welcome'])->name('welcome');
Route::get('/DestinationWedding', [WebController::class,'DestinationWedding'])->name('DestinationWedding');
Route::get('/TraditionalWedding', [WebController::class, 'TraditionalWedding'])->name('TraditionalWedding');
Route::get('/menu', [WebController::class, 'menu'])->name('menu');
Route::get('/review', [WebController::class, 'review'])->name('review');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/confirm', [WebController::class, 'confirm'])->name('confirm');

Route::get('/submitContact', [WebController::class, 'submitContact'])->name
('submitContact');
//frontend event
Route::get('/events', [WebController::class, 'events'])->name('events');

//admin side


// Frontend Routes
// Route::get('/events', [EventController::class, 'index'])->name('events.index');
 // List all events
// Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
 // Show single event

// Admin Routes (CRUD for Events)
// Route::prefix('admin')->group(function () {
//     Route::get('/events', [EventController::class, 'adminIndex'])->name('admin.EventAd.index');
//     Route::get('/events/create', [EventController::class, 'create'])->name('admin.EventAd.create');
//     Route::post('/events', [EventController::class, 'store'])->name('admin.EventAd.store');


//     Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('admin.EventAd.edit');
//     Route::put('/events/{event}', [EventController::class, 'update'])->name('admin.EventAd.update');
//     Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('admin.EventAd.destroy');
// });

// Route::get('/EventAd', [EventController::class, 'index'])->name('EventAd.index'); 
// Route::resource('/admin/EventAd', EventController::class); 

Route::prefix('admin')->group(function () {
    Route::get('/events', [EventController::class, 'adminIndex'])->name('admin.EventAd.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('admin.EventAd.create');
    Route::post('/events', [EventController::class, 'store'])->name('admin.EventAd.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('admin.EventAd.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('admin.EventAd.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('admin.EventAd.destroy');
});

Route::get('/EventAd', [EventController::class, 'index'])->name('EventAd.index');







//for admin(id,pass)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/welcome', function () {
    return view('web.welcome');
})->name('welcome');


Route::get('/submitContact', function () {
    return view('web.submitContact');
})->name('submitContact');


Route::get('/destination-wedding', function () {
    return view('web.destinationWedding'); // Ensure this view file exists
})->name('DestinationWedding');

// Route for Traditional Wedding
Route::get('/traditional-wedding', function () {
    return view('web.traditionalWedding'); // Ensure this view file exists
})->name('TraditionalWedding');

// Route for Menus
Route::get('/menu', function () {
    return view('web.menu'); // Ensure this view file exists
})->name('menu');

// Route for Reviews
Route::get('/review', function () {
    return view('web.review'); // Ensure this view file exists
})->name('review');

// Route for Contact
Route::get('/contact', function () {
    return view('web.contact'); // Ensure this view file exists
})->name('contact');

Route::get('/confirm', function () {
    return view('web.confirm'); // Ensure this view exists
})->name('confirm');


// Route for showing the form (if needed, or you already have it)
Route::get('/destination-wedding', [DestinationWeddingController::class, 'create'])->name('destinationWeddings.create');

// Route for storing the form data
Route::post('/destination-wedding', [DestinationWeddingController::class, 'store'])->name('destinationWeddings.store');

// Route for the confirmation page
Route::get('/confirmation', function() {
    return view('confirmation'); // This view should show the success message or confirmation details
})->name('confirmation.page');

// for admin


Route::prefix('admin')->group(function () {
    Route::get('/destination-weddings', [DestinationWeddingController::class, 'index'])->name('admin.destinationWeddings.index');
    Route::get('/destination-weddings/create', [DestinationWeddingController::class, 'create'])->name('admin.destinationWeddings.create');
    Route::post('/destination-weddings', [DestinationWeddingController::class, 'store'])->name('admin.destinationWeddings.store');
    Route::get('/destination-weddings/{id}/edit', [DestinationWeddingController::class, 'edit'])->name('admin.destinationWeddings.edit');
    Route::put('/destination-weddings/{id}', [DestinationWeddingController::class, 'update'])->name('admin.destinationWeddings.update');
    Route::delete('/destination-weddings/{id}', [DestinationWeddingController::class, 'destroy'])->name('admin.destinationWeddings.destroy');
});


// authentication routes
Auth::routes();


