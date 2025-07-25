<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bahan',
        'gambar',
        'spesifikasi',
        
    ];
}
