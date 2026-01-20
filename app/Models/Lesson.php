<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vocabulary;
use App\Models\Quiz;

class Lesson extends Model
{
    protected $fillable = ['title', 'description', 'icon'];

    public function vocabularies()
    {
        return $this->hasMany(Vocabulary::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function quizzes()
    {
        return $this->hasOne(Quiz::class);
    }

}

