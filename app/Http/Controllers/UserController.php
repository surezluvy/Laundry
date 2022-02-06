<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;

class UserController extends Controller
{
    // Profile
    function profile(){
        $data = Booking::with(['laundry', 'user'])->where('user_id', auth()->user()->user_id)->latest()->take(3)->get();
        return view('main.user.profile', compact('data'));
    }
    
    function setting(){
        return view('main.user.setting');
    }
    
    function addressChange(){
        return view('main.user.address-change');
    }
    
    function profileChange(Request $request){

        // $data = User::findOrFail(auth()->user()->user_id);
        
        if($request->password == null){
            $validateData = $request->validate([
                'full_name' => 'required|min:3|string',
                'email' => 'required|email:dns',
                'phone' => 'required|min:10',
                'address' => 'required|min:5',
                'address_detail' => 'required|min:5',
            ]);

            $user = User::findOrFail(auth()->user()->user_id)->update([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'address_detail' => $request->address_detail,
            ]);

            if($user){
                return redirect()->route('profile')->with(['success' => 'Berhasil memperbarui data']);
            } else{
                return redirect()->route('profile')->with(['error' => 'Gagal memperbarui data']);
            }
        } else{
            $validateData = $request->validate([
                'full_name' => 'required|min:3|string',
                'email' => 'required|email:dns',
                'phone' => 'required|min:10',
                'address' => 'required|min:5',
                'address_detail' => 'required|min:5',
                'password' => 'min:8'
            ]);
            $validateData['password'] = bcrypt($validateData['password']);
            
            $user = User::findOrFail(auth()->user()->user_id)->update([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'address_detail' => $request->address_detail,
                'password' => $validateData['password'],
            ]);

            if($user){
                return redirect()->route('profile')->with(['success' => 'Berhasil memperbarui data']);
            } else{
                return redirect()->route('profile')->with(['error' => 'Gagal memperbarui data']);
            }
        }
    }

    function addressChangeProcess(Request $request){
        $user = User::findOrFail(auth()->user()->user_id)->update([
            'user_lat' => $request->user_lat,
            'user_long' => $request->user_long,
        ]);

        if($user){
            return redirect()->route('profile')->with(['success' => 'Alamat berhasil memperbarui data']);
        } else{
            return redirect()->route('profile')->with(['error' => 'Alamat gagal memperbarui data']);
        }
    }

    // Register
    function register(){
        return view('main.auth.register');
    }
    function store(Request $request){
        $validateData = $request->validate([
            'full_name' => 'required|min:3|string',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|min:10|unique:users',
            'address' => 'required|min:5',
            'address_detail' => 'required|min:5',
            'user_lat' => 'required',
            'user_long' => 'required',
            'password' => 'required|min:8'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);

        // $request->session()->flash('success', 'Berhasil mendaftar! Silahkan masuk');
        return redirect('user/login')->with('success', 'Berhasil mendaftar! Silahkan masuk');
    }

    // Login
    function login(){
        return view('main.auth.login');
    }
    public function authenticate(Request $request)
    {
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

        return back()->with('loginError', 'Login gagal! Silahkan perbaiki data anda');
    }
    function auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Menghindari hacking session fixation
            $request->session()->regenerate();

            // Masuk ke middleware dulu untuk keamanan
            return redirect()->intended('/');
            // return(auth()->user());
        }

        return back()->with('loginError', 'Login gagal! Silahkan perbaiki data anda');
    }

    // Logout
    function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('user/login')->with('success', 'Berhasil logout.');
    }
}
