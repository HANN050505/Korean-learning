<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $fillable = ['lesson_id', 'korean', 'latin', 'meaning'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
