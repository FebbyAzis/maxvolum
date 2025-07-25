<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Users;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'no_pesanan',
        'jenis_tas',
        'bahan_luar',
        'bahan_tengah',
        'bahan_dalam',
        'ukuran_tas_khusus',
        'warna_bahan',
        'list_tas',
        'catatan',
        'status',
        'tanggal_pesan',
        'subtotal',
        'pengiriman',
        'bukti_pembayaran',
        
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
