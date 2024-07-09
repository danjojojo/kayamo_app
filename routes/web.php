<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinishedController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceOptionsController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Middleware\Auth;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// WELCOME
Route::view('/', 'pages.welcome')->name('welcome');


Route::middleware('guest')->group(function(){
    
    // ACCT TYPE
    Route::view('/create', 'auth.create')->name('create');
    
    // ABOUT
    Route::view('/about', 'pages.about')->name('about');

    
    // SIGN UP
    Route::get('/register', function(Request $request) {
        $acctype = $request->query('acctype', '');
        return view('auth.register', ['acctype' => $acctype]);
    })->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    // LOG IN
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
    
Route::middleware('auth')->group(function(){

    // REQUESTS
    Route::view('/pick_service', 'pages.services')->name('pick_service'); // PICK SERVICE
    Route::get('/make_request', function(Request $request) {
        $type = $request->query('type', 'carpentry');
        return view('requests.create', ['type' => $type]);
    })->name('make_request'); // MAKE REQUEST

    // VISITS
    Route::get('/visits', [DashboardController::class, 'visitView'])->name('visits');

    // QUOTES
    Route::get('/quotes', [DashboardController::class, 'quotesView'])->name('quotes');
    Route::get('/submit_quote', function(Request $request) {
        $request = $request->query('request', '');
        return view('quotes.create', ['request' => $request]);
    })->name('submit_quote'); // SUBMIT QUOTE

    // BOOKINGS
    // Route::get('/bookings', [DashboardController::class, 'bookingsView'])->name('bookings');

    // FINISHED
    Route::get('/finished', [FinishedController::class, 'index'])->name('finished');
    Route::get('/finished/{booking}', [FinishedController::class, 'show'])->name('finished.show');

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // SERVICE REQUESTS CONTROLLER
    Route::get('requests/{serviceRequest}', [ServiceRequestController::class, 'show'])->name('requests.show');
    Route::get('requests/{serviceRequest}/edit', [ServiceRequestController::class, 'edit'])->name('requests.edit');
    Route::put('requests/{serviceRequest}', [ServiceRequestController::class, 'update'])->name('requests.update');
    Route::delete('requests/{serviceRequest}', [ServiceRequestController::class, 'destroy'])->name('requests.destroy');
    Route::resource('requests', ServiceRequestController::class);
    
    // SERVICE OPTIONS CONTROLLER
    Route::resource('services', ServiceOptionsController::class);
    
    // QUOTES CONTROLLER
    Route::resource('quotes', QuotesController::class);
    
    // PROFILE CONTROLLER
    Route::get('/profile/{user}', [ProfileController::class, 'profile'] )->name('profile');
    Route::get('/profile/{user}/reviews', [ReviewController::class, 'index'])->name('profile_reviews');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile_edit');
    Route::get('/profile/{user}/settings', [ProfileController::class, 'settings'])->name('profile_settings');
    Route::put('/profile/{user}/settings/email', [ProfileController::class, 'editEmail'])->name('profile_edit_email');
    Route::get('/profile/{user}/settings/email', [ProfileController::class, 'email'])->name('profile_email');
    Route::get('/profile/{user}/settings/password', [ProfileController::class, 'password'])->name('profile_password');
    Route::get('/profile/{user}/portfolio', [PortfolioController::class, 'index'])->name('profile_portfolio');
    Route::put('/profile/{user}', [ProfileController::class, 'editProfile'])->name('profile.update');
    Route::put('/profile/{user}/settings/password', [ProfileController::class, 'editPassword'])->name('profile_edit_password');

    // BOOKING CONTROLLER
    Route::resource('bookings', BookingController::class);
    
    // REVIEW CONTROLLER
    Route::resource('reviews', ReviewController::class);
    Route::get('/reviews/create/{booking}', [ReviewController::class, 'create'])->name('reviews.create');
    Route::view('/make_review', 'reviews.create')->name('make_review'); 

    // PORTFOLIO CONTROLLER
    Route::resource('portfolio', PortfolioController::class);
});
