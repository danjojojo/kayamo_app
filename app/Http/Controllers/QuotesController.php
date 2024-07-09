<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Http\Requests\StoreQuotesRequest;
use App\Http\Requests\UpdateQuotesRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Number;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookedServiceRequestIds = Booking::pluck('service_request_id')->all();

        if(Auth::user()->acctype == 'handyman'){
            $quotes = Auth::user()->quotes()
                ->whereNotIn('service_request_id', $bookedServiceRequestIds)
                ->latest()
                ->paginate(6);
        } else{
            $quotes = Quote::whereNotIn('service_request_id', $bookedServiceRequestIds)
                ->with(['user', 'serviceRequest.user'])
                ->latest()
                ->paginate(6);
        }

        // dd($quotes);
        return view('pages.quotes', compact('quotes'));
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
        //   
        $fields = $request->validate([
            'amount' => ['required', 'max:9999999'],
            'service_request_id' => ['required', 'exists:service_requests,id'], // Validate the service_request_id
        ]);
        
        $fields['user_id'] = Auth::id();

        // Create a post
        Quote::create($fields);
        
        // Redirect back to page 1
        return redirect()->route('quotes.index')->with('success', 'Your quote was successfully submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quotes, $id)
    {
        //
        $quote = Quote::findOrFail($id);
        
        return view('quotes.edit', ['quote' => $quote]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuotesRequest $request, Quote $quotes, $id)
    {
        
        $quote = Quote::findOrFail($id);

        if($quote['allowUpdate'] == 0){
            $fields = $request->validate([
                'allowUpdate' => ['required', 'in:true,false,1,0']
            ]);
    
            // Update a post
            $quote->update($fields);
    
            // Redirect back to page 1
            return back()->with('successAllowUpdate', 'Success! Wait for the final quote.');
        }
        else{

            $fields = $request->validate([
                'finalAmount' => ['required', 'max:9999999'],
            ]);
            
            // Update a post
            $quote->update($fields);
            
            // Redirect back to page 1
            return redirect()->route('quotes.index')->with('success', 'Your final quote was successfully submitted!');
        }
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quote = Quote::findOrFail($id); // Fetch the quote by ID
        
        // Perform deletion
        $quote->delete();
        
        return redirect()->route('quotes.index')->with('delete', 'Quote successfully deleted!');
    }
}
