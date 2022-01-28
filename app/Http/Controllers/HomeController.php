<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;

class HomeController extends Controller
{
    function index(){
        $data = Laundry::all();
        // $posts = Post::latest()->get();
        return view('main.index', compact('data'));
    }
}
