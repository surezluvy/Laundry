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
use App\Models\Layanan;

class HomeController extends Controller
{
    function index(Request $request){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians('.auth()->user()->user_lat.') ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians('.auth()->user()->user_long.') ) + sin ( radians('.auth()->user()->user_lat.') ) * sin( radians( laundry_lat ) ))) AS distance')
        ->havingRaw('distance <= 20')
        ->where('status', 'Sudah dikonfirmasi')
        ->take(5)
        ->get();

        if($request->search != null){
            $data = DB::table('laundries')
            ->selectRaw('laundries.*, (6371 * acos (cos ( radians('.auth()->user()->user_lat.') ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians('.auth()->user()->user_long.') ) + sin ( radians('.auth()->user()->user_lat.') ) * sin( radians( laundry_lat ) ))) AS distance')
            ->havingRaw('distance <= 20')
            ->where('laundry_name', 'like', '%'.$request->search.'%')
            ->take(5)
            ->get();
        }
        
        // dd(auth()->user()->role);
        return view('main.laundry.index', compact('data'));
    }

    function allLaundry(){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians('.auth()->user()->user_lat.') ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians('.auth()->user()->user_long.') ) + sin ( radians('.auth()->user()->user_lat.') ) * sin( radians( laundry_lat ) ))) AS distance')
        ->orderBy('distance', 'asc')
        ->get();

        return view('main.laundry.all-laundry', compact('data'));
    }

    function detail($id){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians('.auth()->user()->user_lat.') ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians('.auth()->user()->user_long.') ) + sin ( radians('.auth()->user()->user_lat.') ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', $id)
        ->havingRaw('distance <= 20')
        ->with(['laundryFitur'])
        ->get();
        
        $latest = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians('.auth()->user()->user_lat.') ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians('.auth()->user()->user_long.') ) + sin ( radians('.auth()->user()->user_lat.') ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', '!=', $id)
        ->havingRaw('distance <= 20')
        ->get(3);
        
        $fitur = LaundryFitur::where('laundry_id', $id)->get();

        return view('main.laundry.detail', compact('data', 'latest', 'fitur'));
    }

    function layanan($id, $metode = null){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians('.auth()->user()->user_lat.') ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians('.auth()->user()->user_long.') ) + sin ( radians('.auth()->user()->user_lat.') ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', $id)
        ->havingRaw('distance <= 20')
        ->get();
        $ongkir = Ongkir::all();

        $harga_ongkir = '';
        $subtotal = '';
        $total = '';

        $layanan = Layanan::where('laundry_id', $id)->get();

        foreach ($data as $d) {
            for($i = 0; $i < $ongkir->count(); $i++){
                if($d->distance >= $ongkir[$i]->jarak && $d->distance <= $ongkir[$i+1]->jarak){
                    $harga_ongkir = $ongkir[$i+1]->harga;
                    $subtotal = $ongkir[0]->harga;
                    $total = $d->laundry_price + $ongkir[$i+1]->harga;
                }elseif($d->distance <= $ongkir[0]->jarak){
                    // dd($d->distance >= $ongkir[$i]->jarak);
                    $harga_ongkir = $ongkir[0]->harga;
                    // $harga_ongkir = (float) $harga_ongkir1;
                    $subtotal = $ongkir[0]->harga;
                    $total = $d->laundry_price + $ongkir[0]->harga;
                }
            }
        }

        // foreach ($data as $d) {
        //     if($d->distance <= $ongkir[0]->jarak){
        //         $harga_ongkir = $ongkir[0]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[0]->harga;
        //     }elseif($d->distance >= $ongkir[0]->jarak && $d->distance <= $ongkir[1]->jarak){
        //         $harga_ongkir = $ongkir[1]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[1]->harga;
        //     }elseif($d->distance >= $ongkir[1]->jarak && $d->distance <= $ongkir[2]->jarak){
        //         $harga_ongkir = $ongkir[2]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[2]->harga;
        //     }elseif($d->distance >= $ongkir[2]->jarak && $d->distance <= $ongkir[3]->jarak){
        //         $harga_ongkir = $ongkir[3]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[3]->harga;
        //     }elseif($d->distance >= $ongkir[3]->jarak){
        //         $harga_ongkir = $ongkir[4]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[4]->harga;
        //     }
        // }

        if($metode == 'antar'){
            $total = $total-=5000;
        }

        if($metode == null){
            return view('main.laundry.pesan.layanan', compact('data', 'ongkir', 'harga_ongkir', 'total', 'subtotal', 'layanan'));
        }else{
            return view('main.laundry.pesan.layanan', compact('data', 'ongkir', 'harga_ongkir', 'total', 'subtotal', 'metode', 'layanan'));
        }
    }

    function pesan($id, $layanan_id, $metode = null){
        $data = Laundry::selectRaw('laundries.*, (6371 * acos (cos ( radians('.auth()->user()->user_lat.') ) * cos( radians( laundry_lat ) ) * cos( radians( laundry_long ) - radians('.auth()->user()->user_long.') ) + sin ( radians('.auth()->user()->user_lat.') ) * sin( radians( laundry_lat ) ))) AS distance')
        ->where('laundry_id', $id)
        ->havingRaw('distance <= 20')
        ->get();
        $ongkir = Ongkir::all();

        $harga_ongkir = '';
        $subtotal = '';
        $total = '';

        $layanan = Layanan::where('layanan_id', $layanan_id)->first();

        foreach ($data as $d) {
            for($i = 0; $i < $ongkir->count(); $i++){
                if($d->distance >= $ongkir[$i]->jarak && $d->distance <= $ongkir[$i+1]->jarak){
                    $harga_ongkir = $ongkir[$i+1]->harga;
                    $subtotal = $ongkir[0]->harga;
                    $total = $d->laundry_price + $ongkir[$i+1]->harga;
                }elseif($d->distance <= $ongkir[0]->jarak){
                    // dd($d->distance >= $ongkir[$i]->jarak);
                    $harga_ongkir = $ongkir[0]->harga;
                    // $harga_ongkir = (float) $harga_ongkir1;
                    $subtotal = $ongkir[0]->harga;
                    $total = $d->laundry_price + $ongkir[0]->harga;
                }
            }
        }

        // foreach ($data as $d) {
        //     if($d->distance <= $ongkir[0]->jarak){
        //         $harga_ongkir = $ongkir[0]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[0]->harga;
        //     }elseif($d->distance >= $ongkir[0]->jarak && $d->distance <= $ongkir[1]->jarak){
        //         $harga_ongkir = $ongkir[1]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[1]->harga;
        //     }elseif($d->distance >= $ongkir[1]->jarak && $d->distance <= $ongkir[2]->jarak){
        //         $harga_ongkir = $ongkir[2]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[2]->harga;
        //     }elseif($d->distance >= $ongkir[2]->jarak && $d->distance <= $ongkir[3]->jarak){
        //         $harga_ongkir = $ongkir[3]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[3]->harga;
        //     }elseif($d->distance >= $ongkir[3]->jarak){
        //         $harga_ongkir = $ongkir[4]->harga;
        //         $subtotal = $ongkir[0]->harga;
        //         $total = $d->laundry_price + $ongkir[4]->harga;
        //     }
        // }

        if($metode == 'antar'){
            $total = $total- $harga_ongkir;
        }

        if($metode == null){
            return view('main.laundry.pesan.metode', compact('data', 'ongkir', 'harga_ongkir', 'total', 'subtotal', 'layanan', 'layanan_id'));
        }else{
            return view('main.laundry.pesan.alamat', compact('data', 'ongkir', 'harga_ongkir', 'total', 'subtotal', 'metode', 'layanan', 'layanan_id'));
        }
    }

    function proses_pesan(Request $request){
        Booking::create([
            'laundry_id' => $request->laundry_id,
            'user_id' => $request->user_id,
            'metode' => $request->metode,
            'subtotal' => $request->subtotal,
        ]);
        // dd($request);

        // $request->session()->flash('success', 'Berhasil mendaftar! Silahkan masuk');
        return redirect('user')->with('success', 'Pemesanan berhasil, silahkan lihat riwayat anda dibawah');
    }

    function allBooking(){
        $data = Booking::with(['laundry', 'user'])->where('user_id', auth()->user()->user_id)->latest()->get();
        return view('main.booking.all_booking', compact('data'));
    }
    function trackBooking($id){
        $data = Booking::with(['laundry', 'user'])->where('booking_id', $id)->first();
        return view('main.booking.track', compact('data'));
    }
}
