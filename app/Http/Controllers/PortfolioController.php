<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $totalBookings = $user->bookings()->where('status', 'Completed')->count();
        $totalRequests = $user->serviceRequests()->count();
        $pictures = Portfolio::where('user_id', $user->id)->latest()->get();
        $picturesCount = Portfolio::where('user_id', $user->id)->count();
        
        return view('profile.portfolio', compact('user', 'totalBookings', 'totalRequests', 'pictures', 'picturesCount'));
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
    public function store(StorePortfolioRequest $request)
    {
        //
        $fields = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'image' => ['required','file', 'max:5000', 'mimes:png,jpg']
        ]);
        
        $path = Storage::disk('public')->put('portfolio_images', $request->file('image'));

        Portfolio::create([
            'user_id' => $fields['user_id'],
            'image' => $path
        ]);

        return redirect()->route('profile_portfolio', ['user' => $fields['user_id']])->with('success', 'Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pictureID)
    {
        $user = Auth::id();

        $picture = Portfolio::findOrFail($pictureID); // Fetch the quote by ID

        Storage::disk('public')->delete($picture->image);
        
        // Perform deletion
        $picture->delete();
        
        return redirect()->route('profile_portfolio', ['user' => $user])->with('delete', 'Image deleted successfully!');
    }
}
