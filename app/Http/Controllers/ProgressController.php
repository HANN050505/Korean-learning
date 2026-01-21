<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\LoginHistory;
use App\Models\Quiz;       // Penting: Import Model Quiz
use App\Models\QuizResult; // Penting: Import Model QuizResult

class ProgressController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // BAGIAN 1: GRAFIK LOGIN (Tetap sama)
        $startOfMonth = Carbon::now()->startOfMonth(); 
        $endOfMonth   = Carbon::now()->endOfMonth();

        $logs = LoginHistory::where('user_id', $userId)
                    ->whereBetween('login_date', [$startOfMonth, $endOfMonth])
                    ->get()
                    ->map(function($item) {
                        return Carbon::parse($item->login_date)->locale('en')->format('l'); 
                    })
                    ->countBy() 
                    ->toArray();

        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $stats = [];

        foreach ($days as $day) {
            $count = $logs[$day] ?? 0;
            
            $height = ($count / 5) * 100;
            if ($height > 100) $height = 100;
            if ($count > 0 && $height < 10) $height = 10;

            $stats[$day] = [
                'count'  => $count,
                'height' => $height
            ];
        }

        // BAGIAN 2: PROGRESS BELAJAR (BERDASARKAN KUIS)
        
        // 1. Hitung total semua kuis yang ada di database
        $totalQuizzes = Quiz::count();


        $passedQuizzes = QuizResult::where('user_id', $userId)
                    ->where('score', '>', 80) // <--- UBAH JADI > 80 (Artinya 81 ke atas baru Lulus)
                    ->distinct('quiz_id')
                    ->count();

        // 3. Hitung Persentase
        if ($totalQuizzes > 0) {
            $percentage = ($passedQuizzes / $totalQuizzes) * 100;
        } else {
            $percentage = 0;
        }

        return view('progress.progress', [
            'stats'      => $stats,
            'percentage' => round($percentage),
            'completed'  => $passedQuizzes, // Mengirim jumlah kuis yg lulus
            'total'      => $totalQuizzes   // Mengirim total kuis
        ]);
    }

    public function home()
    {
        $userId = Auth::id();

        // 1. Hitung Total Kuis
        $totalQuizzes = Quiz::count();

        // 2. Hitung Kuis yang Lulus (> 80)
        $passedQuizzes = QuizResult::where('user_id', $userId)
                    ->where('score', '>', 80)
                    ->distinct('quiz_id')
                    ->count();

        // 3. Hitung Persentase
        $percentage = $totalQuizzes > 0 ? ($passedQuizzes / $totalQuizzes) * 100 : 0;

        // Return ke view 'home' dengan membawa data variabel
        return view('home.home', [
            'percentage' => round($percentage),
            'completed'  => $passedQuizzes,
            'total'      => $totalQuizzes
        ]);
    }

    
}