<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundryFitur extends Model
{
    use HasFactory;

    public function laundry(){
        return $this->hasOne(Laundry::class);
    }
}
