<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Pesanan;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}
