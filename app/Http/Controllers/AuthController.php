<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register
    public function register(Request $request){
        // By using Request object, we can obtain data from the register form in register.blade.php
        // dd($request);

        // Validate
        $fields = $request->validate([
            'fname' => ['required', 'max:255'],
            'lname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'], // unique in users table
            'password' => ['required', 'min:3', 'confirmed'],
            'acctype' => ['required', 'in:customer,handyman']
        ],[
            'fname.required' => 'Please input your first name.',
            'fname.max' => 'Your name is too long.',
            'lname.required' => 'Please input your last name.',
            'lname.max' => 'Your name is too long.',
            'password.confirmed' => 'The passwords do not match!'
        ]);
        // When there errors in validation, it generates an assoc array containing the column and the respective error msg
        // ex: [ 'fname' => 'First name must be filled!']

        // Register
        // We can pass the values from the $request to a variable like $fields
        // Instead of calling each columns inside the create(), we can just insert the $fields as a parameter
        $user = User::create($fields);

        // Login
        // To store a user in the login function, we can first store the User::create($fields) inside a variable like $user
        // Then we insert $user inside the login() as a parameter
        Auth::login($user);

        // Redirect
        return redirect()->route('welcome');

    }

    // Login
    public function login(Request $request){

        // Validate login
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // Try to login user
        // $request->remember has value depending on the checkbox on login form
        // if true, it will remember the user
        if(Auth::attempt($fields, $request->remember)){
            return redirect()->intended();
        } else{
            return back()->withErrors([
                'failed' => 'Invalid credentials!'
            ]);
        }

    }

    // Log out
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
