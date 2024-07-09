<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Quotes;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $user_id = Auth::id();

        $bookings = Booking::where('status', 'ongoing')->with(['user', 'serviceRequest'])->latest()->paginate(6); // GET PAGINATED REQUESTS
        // $bookings = Booking::whereHas('serviceRequest', function ($query) use ($user_id){
        //     $query->where('user_id', $user_id);
        // })->where('status', 'pending')->latest()->paginate(6);
        // // dd($quotes);
        return view('pages.bookings', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        //
        $fields = $request->validate([
            'quote_id' => ['required', 'exists:quotes,id'], // Validate 
            'service_request_id' => ['required', 'exists:service_requests,id'], // Validate 
            'user_id' => ['required', 'exists:users,id'], // Validate 
        ]);

        // Create a post
        Booking::create($fields);
        
        // Redirect back to page 1
        return redirect()->route('bookings.index')->with('success', 'Booking successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
        // dd('ok');
        // $userId = Auth::user()->id;
        // $userHasQuote = Quote::where('user_id', $userId)->where('service_request_id', $serviceRequest->id)->exists();
        // $bookedRequest = Booking::where('service_request_id', $serviceRequest->id)->exists();

        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
        $return = '';

        $fields = $request->toArray();
        
        $booking->update($fields);

        if($booking['confirmCustomer'] == 1 && $booking['confirmHandyman'] == 1 ){
            // dd('ok');
            $booking['status'] = 'Completed';
            $booking['date_finished'] = now();
            $booking->update();
            return redirect()->route('finished')->with('success', 'Your request is finally completed!');
        }
        else{
            // dd('back');
            return back();
        } 
           

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
