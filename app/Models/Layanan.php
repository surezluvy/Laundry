<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $guarded = ['layanan_id'];
    protected $table = 'layanans';
    protected $primaryKey = 'layanan_id';
}
