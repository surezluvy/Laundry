<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;
    protected $primaryKey = 'laundry_id';
    
    public function laundryFitur(){
        return $this->belongsTo(LaundryFitur::class);
    }

    public function booking(){
        return $this->hasOne(Booking::class);
    }
}
