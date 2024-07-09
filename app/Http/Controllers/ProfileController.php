<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function profile(User $user){

        $totalBookings = $user->bookings()->where('status', 'Completed')->count();
        $totalRequests = $user->serviceRequests()->count();

        return view('profile.about', compact('user', 'totalBookings', 'totalRequests'));
    }

    public function edit(User $user){
        
        return view('profile.edit', compact('user'));
    }

    public function settings(User $user){
        
        return view('profile.settings', compact('user'));
    }

    public function email(User $user){
        
        return view('profile.email', compact('user'));
    }

    public function password(User $user){
        
        return view('profile.password', compact('user'));
    }

    public function editProfile(Request $request,User $user){

        $fields = $request->validate([
            'image' => ['nullable', 'file', 'max:5000', 'mimes:png,jpg'],
            'fname' => ['required'],
            'lname' => ['required'],
            'subdivision' => ['required'],
            'contactnum' => ['required', 'max:11'],
            'aboutme' => ['nullable']
        ]);

        if($fields['aboutme'] == null){
            $fields['aboutme'] = 'No information provided.';
        }
        
        
        $path = null;
        if ($request->hasFile('image')) {
            if($user->image != null){
                Storage::disk('public')->delete($user->image);
            }
            $path = Storage::disk('public')->put('profile_images', $request->file('image'));
            $user->update([
                'image' => $path,
                'fname' => $fields['fname'],
                'lname' => $fields['lname'],
                'subdivision' => $fields['subdivision'],
                'contactnum' => $fields['contactnum'],
                'aboutme' => $fields['aboutme'],
            ]);

            return redirect()->route('profile', ['user' => $user])->with('success', 'Profile saved successfully.');
        }
        else{
            $user->update([
                'fname' => $fields['fname'],
                'lname' => $fields['lname'],
                'subdivision' => $fields['subdivision'],
                'contactnum' => $fields['contactnum'],
                'aboutme' => $fields['aboutme'],
            ]);

            return redirect()->route('profile', ['user' => $user])->with('success', 'Profile saved successfully.');
        }
    }

    public function editEmail(Request $request, User $user){
        
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email', 'unique:users'], // unique in users table
        ]);
       
        $user ->update($fields);

        // Redirect back to page 1
        return redirect()->route('profile', ['user' => $user])->with('success', 'Profile saved successfully.');

    }
    public function editPassword(Request $request, User $user){
        $fields = $request->validate([
            'password' => ['required', 'min:3', 'confirmed'],
        ],[
            'password.confirmed' => 'The passwords do not match!'
        ]);
        
        $user->update($fields);

        return redirect()->route('profile', ['user' => $user])->with('success', 'Profile saved successfully.');
    }
}
