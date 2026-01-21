<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $table = 'quiz_results';
    
    // GANTI $fillable JADI INI:
    // Kosongkan array ini artinya "TIDAK ADA YANG DIJAGA" (Semua boleh masuk)
    protected $guarded = []; 
}