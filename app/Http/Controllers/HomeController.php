<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Laundry;
use App\Models\User;
use App\Models\Ongkir;
use App\Models\LaundryFitur;
use App\Models\Booking;

class HomeController extends Controller
{
    function index(Request $request){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->havingRaw('distance <= 20')
        ->take(5)
        ->get();

        if($request->search != null){
            $data = DB::table('laundries')
            ->selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
            ->havingRaw('distance <= 20')
            ->where('laundry_name', 'like', '%'.$request->search.'%')
            ->take(5)
            ->get();
        }
        
        return view('main.laundry.index', compact('data'));
    }

    function allLaundry(){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->orderBy('distance', 'asc')
        ->get();

        return view('main.laundry.all-laundry', compact('data'));
    }

    function detail($id){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', $id)
        ->havingRaw('distance <= 20')
        ->with(['laundryFitur'])
        ->get();
        
        $latest = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', '!=', $id)
        ->havingRaw('distance <= 20')
        ->get(3);
        
        $fitur = LaundryFitur::where('laundry_id', $id)->get();

        return view('main.laundry.detail', compact('data', 'latest', 'fitur'));
    }

    function pesan($id, $metode = null){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians(-7.4161) ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians(109.2899) ) + sin ( radians(-7.4161) ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', $id)
        ->havingRaw('distance <= 20')
        ->get();
        $ongkir = Ongkir::all();

        $harga_ongkir = '';
        $subtotal = '';
        $total = '';

        foreach ($data as $d) {
            if($d->distance <= $ongkir[0]->jarak){
                $harga_ongkir = $ongkir[0]->harga;
                $subtotal = $ongkir[0]->harga;
                $total = $d->laundry_price + $ongkir[0]->harga;
            }elseif($d->distance >= $ongkir[0]->jarak && $d->distance <= $ongkir[1]->jarak){
                $harga_ongkir = $ongkir[1]->harga;
                $subtotal = $ongkir[0]->harga;
                $total = $d->laundry_price + $ongkir[1]->harga;
            }elseif($d->distance >= $ongkir[1]->jarak && $d->distance <= $ongkir[2]->jarak){
                $harga_ongkir = $ongkir[2]->harga;
                $subtotal = $ongkir[0]->harga;
                $total = $d->laundry_price + $ongkir[2]->harga;
            }elseif($d->distance >= $ongkir[2]->jarak && $d->distance <= $ongkir[3]->jarak){
                $harga_ongkir = $ongkir[3]->harga;
                $subtotal = $ongkir[0]->harga;
                $total = $d->laundry_price + $ongkir[3]->harga;
            }elseif($d->distance >= $ongkir[3]->jarak){
                $harga_ongkir = $ongkir[4]->harga;
                $subtotal = $ongkir[0]->harga;
                $total = $d->laundry_price + $ongkir[4]->harga;
            }
        }

        if($metode == 'antar'){
            $total = $total-=5000;
        }

        if($metode == null){
            return view('main.laundry.pesan.metode', compact('data', 'ongkir', 'harga_ongkir', 'total', 'subtotal'));
        }else{
            return view('main.laundry.pesan.alamat', compact('data', 'ongkir', 'harga_ongkir', 'total', 'subtotal', 'metode'));
        }
    }

    function proses_pesan(Request $request){
        Booking::create([
            'laundry_id' => $request->laundry_id,
            'user_id' => $request->user_id,
            'metode' => $request->metode,
            'subtotal' => $request->subtotal,
            'berat' => '',
        ]);

        // $request->session()->flash('success', 'Berhasil mendaftar! Silahkan masuk');
        return redirect('user/profile')->with('success', 'Pemesanan berhasil, silahkan lihat riwayat anda dibawah');
    }
}
