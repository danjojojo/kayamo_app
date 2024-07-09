<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Booking;
use App\Models\User;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        //
        $totalBookings = $user->bookings()->where('status', 'Completed')->count();
        $totalRequests = $user->serviceRequests()->count();
        $ratedBookingsCount = $user->bookings()->whereHas('reviews')->count();
        $reviews = Review::whereHas('booking', function ($query) {
                        $query->where('rated', 1);
                    })
                    ->whereHas('booking.user', function ($query) use ($user) {
                        $query->where('id', $user->id); // Ensure the review belongs to the specified user
                    })
                    ->with(['booking', 'user']) // Eager load relationships to avoid N+1 query issues
                    ->latest()
                    ->paginate(6);

        $averageRating = Booking::join('reviews', 'bookings.id', '=', 'reviews.booking_id')
                    ->where('bookings.user_id', $user->id) // Filter by user_id in bookings table
                    ->avg('reviews.rating');

        return view('profile.reviews', compact('user', 'totalBookings', 'totalRequests', 'ratedBookingsCount', 'reviews', 'averageRating'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Booking $booking)
    {
        //
        return view('reviews.create', ['booking' => $booking]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        //
        
        $fields = $request->validate([
            'rating' => ['required'],
            'review' => ['required'],
            'booking_id' => ['required'],
            'user_id' => ['required'],
        ]);

        Review::create($fields);

        $booking = Booking::findOrFail($fields['booking_id']);
        $booking['rated'] = 1;
        $booking->update();

        return redirect()->route('finished')->with('success', 'Thank you for submitting a review!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
