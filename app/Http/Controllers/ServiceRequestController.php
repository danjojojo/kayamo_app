<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Http\Requests\StoreServiceRequestRequest;
use App\Http\Requests\UpdateServiceRequestRequest;
use App\Models\Booking;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$requests = ServiceRequest::latest()->get(); // GET ALL REQUESTS
        //$requests = ServiceRequest::latest()->paginate(6); // GET PAGINATED REQUESTS
        if(Auth::user()->acctype == 'customer'){
            $serviceRequests = Auth::user()->serviceRequests()
                ->whereDoesntHave('bookings')
                ->latest()
                ->paginate(6);
        } else{
            $serviceRequests = ServiceRequest::latest()->doesntHave('bookings')
            ->paginate(6);
        }

        return view('pages.requests', ['requests' => $serviceRequests]);
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
    public function store(Request $request)
    {
        // Validate
        
        $fields = $request->validate([
            'type' => ['required', 'max:255'],
            'description' => ['required'],
            'location' => ['required']
        ]);

        // Create a post
        Auth::user()->serviceRequests()->create($fields);

        // Redirect back to page 1
        return redirect()->route('requests.index')->with('success', 'Your request was successfully submitted!');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceRequest $serviceRequest)
    {
        $userId = Auth::user()->id;
        $userHasQuote = Quote::where('user_id', $userId)->where('service_request_id', $serviceRequest->id)->exists();
        $bookedRequest = Booking::where('service_request_id', $serviceRequest->id)->exists();

        return view('requests.show', ['request' => $serviceRequest, 'userHasQuote' => $userHasQuote, 'bookedRequest' => $bookedRequest]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceRequest $serviceRequest)
    {
        //
        return view('requests.edit', ['request' => $serviceRequest]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        //
        // Validate

        $fields = $request->validate([
            'type' => ['required', 'max:255'],
            'description' => ['required'],
            'location' => ['required']
        ]);

        // Update a post
        $serviceRequest->update($fields);

        // Redirect back to page 1
        return redirect()->route('requests.index')->with('success', 'Your request was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceRequest $serviceRequest)
    {
        //
        $serviceRequest->delete();
        
        return redirect()->route('requests.index')->with('delete', 'Your request was successfully deleted!');
    }
}
