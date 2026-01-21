<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\Lesson;
use App\Models\QuizResult; // Pastikan Model ini ada

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

    // ==========================================
    // FUNGSI BARU: MENYIMPAN NILAI KE DATABASE
    // ==========================================
   public function store(Request $request, $id)
{
    // Validasi input (score wajib ada)
    $request->validate([
        'score' => 'required|numeric',
    ]);

    // Simpan ke Database
    // Perhatikan bagian 'correct' => ... ?? 0
    // Itu artinya: "Kalau tidak ada data correct, isi dengan angka 0"
    \App\Models\QuizResult::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'quiz_id' => $id
        ],
        [
            'score'   => $request->score,
            'correct' => $request->correct ?? 0, // <--- INI PENTING
            'wrong'   => $request->wrong ?? 0    // <--- INI PENTING
        ]
    );

    return response()->json(['message' => 'Berhasil disimpan!']);
}
}