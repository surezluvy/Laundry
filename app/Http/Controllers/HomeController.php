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
        // $sql = "SELECT laundry_id, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance FROM laundries HAVING distance <= 200";
        // $data = Laundry::select($sql);
        $data = DB::table('laundries')
        ->selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->havingRaw('distance <= 20')
        ->get();
        // $posts = Post::latest()->get();
        // return view('main.index', compact('data', 'user'));
        dd(auth()->user());
    }

    function dash(){
        return view('main.dash');
    }
}
