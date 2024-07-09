<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;

class FinishedController extends Controller
{
    //
    public function index()
    {
        // 
        $bookings = Booking::where('status', 'completed')->with(['user', 'serviceRequest'])->latest()->paginate(6); // GET PAGINATED REQUESTS
        
        // // dd($quotes);
        return view('pages.finished', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        
        $review = Review::where('booking_id', $booking->id)
                    ->with(['booking', 'user']) // Eager load relationships if needed
                    ->first();

        return view('finished.show', compact('booking','review'));
    }

}
