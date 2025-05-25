<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Users;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
