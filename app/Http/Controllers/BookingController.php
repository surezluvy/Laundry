<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    function all_booking(){
        $data = Booking::with(['laundry', 'user'])->where('user_id', auth()->user()->user_id)->latest()->get();
        return view('main.booking.all_booking', compact('data'));
    }
}
