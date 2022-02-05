<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Laundry;
use App\Models\User;

class HomeController extends Controller
{
    function index(){
        $data = DB::table('laundries')
        ->selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->havingRaw('distance <= 20')
        ->get();
        
        // $session = $request->session()->all();
        // $request->session()->flush();
        return view('main.laundry.index', compact('data'));
        // dd($session['user']['full_name']);
        // dd(auth()->user());
    }

    function allLaundry(){
        $data = Laundry::all();
        
        // $session = $request->session()->all();

        return view('main.laundry.all-laundry', compact('data'));
        // dd($session['user']['full_name']);
        // dd(auth()->user());
    }

    function detail($id){
        $data = DB::table('laundries')
        ->selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', $id)
        ->havingRaw('distance <= 20')
        ->get();
        
        $latest = DB::table('laundries')
        ->selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', '!=', $id)
        ->havingRaw('distance <= 20')
        ->get(3);
        
        // $session = $request->session()->all();

        return view('main.laundry.detail', compact('data', 'latest'));
        // dd($session['user']['full_name']);
        // dd(auth()->user());
    }


    // Profile
    function profile(){

        if(!isset($session['user'])){
            return redirect('/login');
        }
        
        return view('main.profile.index', compact('session'));
    }
    
    function profileEdit(Request $request){
        $session = $request->session()->all();
        
        if(!isset($session['user'])){
            return redirect('/login');
        }
        
        $user = User::findOrFail($session['user']['user_id']);
        return view('main.profile.setting', compact('user'));
    }
    
    function profileChange(Request $request, $id){
        $validateData = $request->validate([
            'full_name' => 'required|min:3|string',
            'email' => 'required|email:dns',
            'phone' => 'required|min:10',
            'address' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if($validateData['password'] != null){
            $validateData['password'] = bcrypt($validateData['password']);
        }

        // $data = User::findOrFail($request->user_id);

        // $data->update([
        //     'full_name' => $request->full_name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'password' => $request->password,
        // ]);
        $user = User::findOrFail($id)->update($request->all()); 

        if($user){
            return redirect()->route('profile')->with(['success' => 'Berhasil memperbarui data']);
        } else{
            return redirect()->route('profile')->with(['error' => 'Gagal memperbarui data']);
        }
    }
}
