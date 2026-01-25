<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// --- SEMUA IMPORT MODEL WAJIB DI SINI ---
use App\Models\User;
use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Vocabulary;
use App\Models\Quiz;      // Dipindahkan ke atas
use App\Models\Question;  // Dipindahkan ke atas

class AdminController extends Controller
{
    // ==========================================
    // DASHBOARD ADMIN
    // ==========================================
    public function index()
    {
        // 1. Hitung Total User (Kecuali Admin)
        $totalUsers = User::where('role', '!=', 'admin')->count();

        // 2. Hitung User Premium
        $premiumUsers = User::where('is_premium', true)
                            ->where('role', '!=', 'admin')
                            ->count();

        // 3. Hitung Total Materi
        $totalLessons = Lesson::count();

        // 4. Hitung Pendapatan
        try {
            $revenue = Payment::where('status', 'success')->sum('amount');
        } catch (\Exception $e) {
            $revenue = 0;
        }

        // 5. User Pendaftar Bulan Ini
        $recentUsers = User::where('role', '!=', 'admin')
                           ->whereMonth('created_at', date('m'))
                           ->whereYear('created_at', date('Y'))
                           ->latest()
                           ->take(5)
                           ->get();

        return view('admin.home', compact('totalUsers', 'premiumUsers', 'totalLessons', 'revenue', 'recentUsers'));
    }

    // ==========================================
    // KELOLA USER
    // ==========================================
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.show', compact('user'));
    }

    public function users()
    {
        $users = User::where('role', '!=', 'admin')
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
    
        return view('admin.users.users', compact('users'));
    }

    public function togglePremium($id)
    {
        $user = User::findOrFail($id);
        $user->is_premium = !$user->is_premium; 
        $user->save();
        return back()->with('success', 'Status premium berhasil diubah.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
    }

    // ==========================================
    // KELOLA LESSONS (MATERI)
    // ==========================================
    public function lessons()
    {
        $lessons = Lesson::withCount('vocabularies') 
                         ->with('quiz')
                         ->orderBy('created_at', 'desc')
                         ->paginate(10);

        return view('admin.lessons.lessons', compact('lessons'));
    }

    public function createLesson()
    {
        return view('admin.lessons.create');
    }

    public function storeLesson(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        Lesson::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description
        ]);

        return redirect()->route('admin.lessons')->with('success', 'Materi berhasil ditambahkan!');
    }

    // ==========================================
    // KELOLA VOCABULARY
    // ==========================================
    public function vocabularies($id)
    {
        // Cari lesson beserta vocab-nya
        $lesson = Lesson::with('vocabularies')->findOrFail($id);
        
        return view('admin.lessons.vocabularies', compact('lesson'));
    }

    public function storeVocabulary(Request $request, $id)
    {
        $request->validate([
            'word_korean' => 'required|string', 
            'meaning' => 'required|string',
            'romanization' => 'nullable|string', 
        ]);

        Vocabulary::create([
            'lesson_id' => $id,
            'korean'    => $request->word_korean,  
            'latin'     => $request->romanization, 
            'meaning'   => $request->meaning,
        ]);

        return back()->with('success', 'Kosakata berhasil ditambahkan!');
    }

    public function deleteVocabulary($id)
    {
        $vocab = Vocabulary::findOrFail($id);
        $vocab->delete();

        return back()->with('success', 'Kosakata berhasil dihapus.');
    }

    // ==========================================
    // KELOLA QUIZZES & BANK SOAL
    // ==========================================
    
    // 1. Halaman Daftar Materi untuk Bank Soal
    public function quizzes()
    {
        $lessons = Lesson::with('quiz')->paginate(10);
        
        return view('admin.quizzes.quizzes', compact('lessons')); 
    }

    // 2. Tampilkan Halaman Kelola Soal (Manage)
    // Di dalam AdminController.php

    public function manageQuiz($id)
    {
        // Tambahkan '.options' di dalam with()
        // Agar Laravel mengambil data opsi dari tabel sebelah juga
        $lesson = Lesson::with('quiz.questions.options')->findOrFail($id);

        return view('admin.quizzes.manage', compact('lesson'));
    }

    // 3. Simpan Soal Baru
    public function storeQuestion(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:a,b,c,d',
        ]);

        $lesson = Lesson::findOrFail($id);

        // Cek apakah Lesson ini sudah punya Quiz? Kalau belum, buatkan.
        $quiz = $lesson->quiz;
        if (!$quiz) {
            $quiz = $lesson->quiz()->create([
                'title' => 'Kuis ' . $lesson->title,
                'description' => 'Kuis untuk materi ' . $lesson->title
            ]);
        }

        // Simpan Soal ke dalam Quiz tersebut
        $quiz->questions()->create([
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()->back()->with('success', 'Soal berhasil ditambahkan!');
    }

    // 4. Hapus Soal
    public function deleteQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->back()->with('success', 'Soal berhasil dihapus!');
    }

    // ==========================================
    // KELOLA KEUANGAN (PAYMENTS)
    // ==========================================
    public function payments()
    {
        // Tambahkan with('user') agar kita bisa ambil nama user pemilik pembayaran
        $payments = Payment::with('user')
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);
                           
        return view('admin.payment.payment', compact('payments'));
    }
}