<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // halaman daftar lesson
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.lessons', compact('lessons'));
    }

    // halaman detail lesson (isi kosakata)
   public function show($id)
{
    $lesson = Lesson::with('vocabularies')->findOrFail($id);

    // LOCK premium
    if ($lesson->id > 2 && !auth()->user()->is_premium) {
        return redirect()
            ->route('lessons.index')
            ->with('error', 'Lesson ini khusus user premium');
    }

    return view('lessons.show', compact('lesson'));
}


}
