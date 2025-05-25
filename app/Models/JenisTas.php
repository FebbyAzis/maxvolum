<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTas extends Model
{
    use HasFactory;

    protected $fillable = [
        'ukuran_tas',
        'gambar',
        'spesifikasi',
        
    ];
}
