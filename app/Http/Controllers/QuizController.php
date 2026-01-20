<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Lesson;

class QuizController extends Controller
{
    public function index()
    {
    $lessons = Lesson::with('quiz')->get();
    return view('quizzes.quizzes', compact('lessons'));
    }


    public function show($id)
    {
        $quiz = Quiz::with('lesson', 'questions.options')->findOrFail($id);
        return view('quizzes.show', compact('quiz'));
    }
}
