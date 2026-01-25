<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'user_id',
        'order_id',
        'amount',
        'status',
        'snap_token'
    ];

    // ==========================================
    // WAJIB DITAMBAHKAN
    // ==========================================
    // Agar kita bisa mengambil nama user pembayar di halaman Admin
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}