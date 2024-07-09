<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function visitView(){
        return view('pages.visits');
    }

    public function quotesView(){
        return view('pages.quotes');
    }

    public function bookingsView(){
        return view('pages.bookings');
    }

    public function finishedView(){
        return view('pages.finished');
    }
}
