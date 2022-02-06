<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard(){
        // $data = Booking::with(['laundry', 'user'])->where('user_id', auth()->user()->user_id)->latest()->get();
        // return view('main.booking.all_booking', compact('data'));
        return view('admin.dashboard');
    }

    function login(){
        return view('admin.login');
    }
}
