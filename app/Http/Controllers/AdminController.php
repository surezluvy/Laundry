<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Booking;
use App\Models\Laundry;

class AdminController extends Controller
{
    function dashboard(){
        $no = 1;
        $total = DB::table("bookings")
                ->select(DB::raw("SUM(subtotal) as total"))
                ->first();
        $data = Booking::with('user')->where('laundry_id', auth()->user()->laundry_id)
            ->orderBy('booking_id', 'desc')->limit(10)->get();
        $user = User::where('level', '!=', 'admin')->limit(10)->get();	
        $booking = Booking::with('user', 'laundry')->limit(10)->get();
        return view('admin.dashboard', compact('data', 'user', 'booking', 'no', 'total'));
    }


    function mitra(){
        $no = 1;
        $data = User::where('level', 'mitra')->get();
        // $data = Laundry::rightJoin('users', 'laundries.user_id', '=', 'users.user_id')->where('users.level', 'mitra')->get();
        // dd($data);  
        return view('admin.mitra.index', compact('data', 'no'));
    }
    function mitraUpdate(Request $request, $id){
        $data = user::findOrFail($id)->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'address_detail' => $request->address_detail,
        ]);

        if($data){
            return redirect()->route('mitra-data')->with(['success' => 'Data mitra berhasil diperbaharui']);
        } else{
            return redirect()->route('mitra-data')->with(['error' => 'Data mitra gagal diperbaharui']);
        }
    }
    function mitraDelete($id){
        $data = user::findOrFail($id)->delete();

        if($data){
            return redirect()->route('mitra-data')->with(['success' => 'Data mitra berhasil dihapus']);
        } else{
            return redirect()->route('mitra-data')->with(['error' => 'Data mitra gagal dihapus']);
        }
    }


    function customer(){
        $no = 1;
        $data = User::where('level', 'customer')->get();
        // dd($data);  
        return view('admin.customer.index', compact('data', 'no'));
    }
    function customerUpdate(Request $request, $id){
        $data = user::findOrFail($id)->update([
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
    function customerDelete($id){
        $data = user::findOrFail($id)->delete();

        if($data){
            return redirect()->route('customer-data')->with(['success' => 'Data customer berhasil dihapus']);
        } else{
            return redirect()->route('customer-data')->with(['error' => 'Data customer gagal dihapus']);
        }
    }

    
    function laundry(){
        $no = 1;
        // Jika terjadi error maka laundry mempunyai relasi dengan user yang soft delete
        $data = Laundry::with('user')->where('user_id', '!=', 'NULL')->get();
        // foreach($data as $d){
        //     dd($d->user->full_name);
        // }  
        return view('admin.laundry.index', compact('data', 'no'));
    }
    function laundryUpdate(Request $request, $id){
        $data = Laundry::findOrFail($id)->update([
            'laundry_name' => $request->laundry_name,
            'laundry_description' => $request->laundry_description,
            'laundry_address' => $request->laundry_address,
            'laundry_address_detail' => $request->laundry_address_detail,
            'laundry_price' => $request->laundry_price,
            'laundry_open' => $request->laundry_open,
        ]);

        if($data){
            return redirect()->route('laundry-data')->with(['success' => 'Data laundry berhasil diperbaharui']);
        } else{
            return redirect()->route('laundry-data')->with(['error' => 'Data laundry gagal diperbaharui']);
        }
    }
    function laundryDelete($id){
        $data = Laundry::findOrFail($id)->delete();
        $data2 = Laundry::findOrFail($id)->first();
        User::findOrFail($data2->users_id)->delete();

        if($data){
            return redirect()->route('laundry-data')->with(['success' => 'Data laundry berhasil dihapus']);
        } else{
            return redirect()->route('laundry-data')->with(['error' => 'Data laundry gagal dihapus']);
        }
    }


    function booking(){
        $no = 1;
        $data = Booking::with('user')->where('laundry_id', auth()->user()->laundryId())->get();
        // dd($data);  
        return view('admin.booking.index', compact('data', 'no'));
    }
    function bookingUpdate(Request $request, $id){
        $data2 = Booking::findOrFail($id)->first();
        $data3 = Laundry::where('laundry_id', $data2->laundry_id)->first();
        $data = Booking::findOrFail($id)->update([
            'subtotal' => $data2->subtotal + ($request->weight * $data3->laundry_price),
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

    function register(){
        return view('admin.register');
    }
    function registerProcess(Request $request){
        $validateData = $request->validate([
            'full_name' => 'required|min:3|string',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|min:10|unique:users',
            'level' => 'required',
            'password' => 'required|min:8'
        ]);

        // $validateData['level'] = 'mitra';
        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);

        return redirect('admin/login')->with('success', 'Berhasil mendaftar! Silahkan masuk');
    }

    function registerLaundry(){
        return view('admin.registerLaundry');
    }
    function registerLaundryProccess(Request $request){
        $validateData = $request->validate([
            'laundry_name' => 'required|min:3|string',
            'laundry_description' => 'required|min:8',
            'laundry_address' => 'required|min:8',
            'laundry_address_detail' => 'required|min:8',
            'laundry_price' => 'required|min:2',
            'laundry_open' => 'required|min:8',
        ]);

        $validateData['user_id'] = auth()->user()->user_id;
        Laundry::create($validateData);

        // dd($validateData['laundry_open']);
        return redirect('admin/')->with('success', 'Laundry berhasil didaftarkan! Harap menunggu konfirmasi dari admin');
    }

    function profile2(){
        $data = User::findOrFail(auth()->user()->user_id)->get();
        return view('admin.admin-profile', compact('data'));
    }
    function profile(){
        $data = Laundry::with('user')->where('user_id', auth()->user()->user_id)->first();
        return view('admin.user-profile', compact('data'));
    }
    function profileChange(){
        $data = User::where('user_id', auth()->user()->user_id)->first();
        return view('admin.profile-change', compact('data'));
    }
    function profileChangeProccess(Request $request, $id){
        if($request->password == NULL){
            $validateData = $request->validate([
                'full_name' => 'required|min:3|string',
                'email' => 'required|email:dns',
                'phone' => 'required|min:10',
            ]);
    
            $user = User::findOrFail($id)->update($validateData);
        } else{
            $validateData = $request->validate([
                'full_name' => 'required|min:3|string',
                'email' => 'required|email:dns',
                'phone' => 'required|min:10',
                'password' => 'required|min:8',
            ]);
    
            $user = User::findOrFail($id)->update($validateData);
        }

        if($user){
            if(auth()->user()->level == 'admin'){
                return redirect()->route('admin-profile2')->with(['success' => 'Berhasil memperbarui data']);
            } else{
                return redirect()->route('admin-profile')->with(['success' => 'Berhasil memperbarui data']);
            }
        } else{
            if(auth()->user()->level == 'admin'){
                return redirect()->route('admin-profile2')->with(['error' => 'Gagal memperbarui data']);
            } else{
                return redirect()->route('admin-profile')->with(['error' => 'Gagal memperbarui data']);
            }
        }
    }
    function laundryChange(){
        $data = Laundry::with('user')->where('user_id', auth()->user()->user_id)->first();
        return view('admin.laundry-change', compact('data'));
    }
    function laundryChangeProccess(Request $request, $id){
        $validateData = $request->validate([
            'laundry_name' => 'required|min:3|string',
            'laundry_description' => 'required|min:8',
            'laundry_address' => 'required|min:8',
            'laundry_address_detail' => 'required|min:8',
            'laundry_price' => 'required|min:2',
            'laundry_open' => 'required|min:8',
        ]);

        $validateData['laundry_lat'] = $request->laundry_lat;
        $validateData['laundry_long'] = $request->laundry_long;

        $user = Laundry::findOrFail($id)->update($validateData);

        if($user){
            return redirect()->route('admin-profile')->with(['success' => 'Berhasil memperbarui data']);
        } else{
            return redirect()->route('admin-profile')->with(['error' => 'Gagal memperbarui data']);
        }
    }

    function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login')->with('success', 'Berhasil logout.');
    }
}
