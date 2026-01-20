<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    // TAMBAHKAN INI AGAR FUNGSI CREATE() BERHASIL
    protected $fillable = [
        'user_id',
        'order_id',
        'amount',
        'status',
        'snap_token'
    ];
}