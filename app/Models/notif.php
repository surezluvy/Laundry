<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notif extends Model
{
    use HasFactory;
    protected $primaryKey = 'notif_id';
    protected $guarded = ['notif_id'];
    protected $table = 'notifications';
    
    public function laundry(){
        return $this->belongsTo(Laundry::class, 'laundry_id', 'laundry_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
