<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;
use App\Models\Laundry;

class AdminController extends Controller
{
    function dashboard(){
        $no = 1;
        $data = Booking::with('user')->where('laundry_id', auth()->user()->laundry_id)
            ->orderBy('booking_id', 'desc')->limit(10)->get();
        return view('admin.dashboard', compact('data', 'no'));
        // dd($data);
    }
    function mitra(){
        $data = User::with('laundry')->where('level', 'mitra')->get();
        // dd($data);  
        return view('admin.mitra.index', compact('data'));
    }
    function customer(){
        $data = User::where('level', 'customer')->get();
        // dd($data);  
        return view('admin.customer.index', compact('data'));
    }
    function customerUpdate(Request $request){
        $data = user::findOrFail($request->user_id)->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'address_detail' => $request->address_detail,
        ]);

        if($data){
            return redirect()->route('customer-data')->with(['success' => 'Data customer berhasil diperbaharui']);
        } else{
            return redirect()->route('customer-data')->with(['error' => 'Data customer gagal diperbaharui']);
        }
    }

    
    function laundry(){
        $data = Laundry::all();
        // dd($data);  
        return view('admin.laundry.index', compact('data'));
    }
    function laundryUpdate(Request $request){
        $data = user::findOrFail($request->laundry_id)->update([
            'laundry_name' => $request->laundry_name,
            'laundry_description' => $request->laundry_description,
            'laundry_address' => $request->laundry_address,
            'laundry_address_detail' => $request->laundry_address_detail,
            'laundry_price' => $request->laundry_price,
            'laundry_open' => $request->laundry_open,
        ]);

        dd($data);

        // if($data){
        //     return redirect()->route('laundry-data')->with(['success' => 'Data laundry berhasil diperbaharui']);
        // } else{
        //     return redirect()->route('laundry-data')->with(['error' => 'Data laundry gagal diperbaharui']);
        // }
    }


    function booking(){
        $no = 1;
        $data = Booking::with('user')->where('laundry_id', auth()->user()->laundry_id)->get();
        // dd($data);  
        return view('admin.booking.index', compact('data', 'no'));
    }
    function bookingUpdate(Request $request){
        $data = Booking::findOrFail($request->booking_id)->update([
            'weight' => $request->weight,
        ]);

        if($data){
            return redirect()->route('booking-data')->with(['success' => 'Data booking berhasil diperbaharui']);
        } else{
            return redirect()->route('booking-data')->with(['error' => 'Data booking gagal diperbaharui']);
        }
    }

    function changeStatus($id, $status){
        Booking::where('booking_id', $id)->update([
            'status' => $status,
        ]);
        // dd($data);  
        return back()->with('success', 'Cannot access to restricted page');
    }
    

    function login(){
        return view('admin.login');
    }
    function loginProcess(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Menghindari hacking session fixation
            $request->session()->regenerate();

            // Masuk ke middleware dulu untuk keamanan
            return redirect()->intended('/admin');
            // return(auth()->user());
        }

        return back()->with('error', 'Login gagal! Silahkan perbaiki data anda');
    }

    function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login')->with('success', 'Berhasil logout.');
    }
}
