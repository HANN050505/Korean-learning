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

// Tambahkan ini di paling bawah Class
    public function markAsComplete($id)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        
        // 1. Cek dulu, apakah user ini sudah pernah menyelesaikan materi ini?
        $cek = \Illuminate\Support\Facades\DB::table('lesson_user')
                ->where('user_id', $user->id)
                ->where('lesson_id', $id)
                ->first();

        // 2. Kalau belum ada, baru kita simpan (supaya tidak double)
        if (!$cek) {
            \Illuminate\Support\Facades\DB::table('lesson_user')->insert([
                'user_id' => $user->id,
                'lesson_id' => $id,
                'is_completed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            return redirect()->back()->with('success', 'Selamat! Materi selesai.');
        }

        return redirect()->back()->with('info', 'Anda sudah menyelesaikan materi ini sebelumnya.');
    }


}
