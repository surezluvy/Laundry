<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    function loginProcess(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('user', auth()->user());
            // $data = $request->session()->all();

            return redirect()->intended('/');
        }

        return back()->with('error', 'Login gagal! Silahkan perbaiki data anda');
    }
}
