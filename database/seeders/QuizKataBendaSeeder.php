<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizKataBendaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. CARI LESSON YANG SUDAH ADA (Berdasarkan Judul)
        // Pastikan LessonSeeder sudah dijalankan sebelumnya agar data ini ketemu.
        $lesson = Lesson::where('title', 'Kata Benda')->first();

        // Cek jika lesson tidak ditemukan (jaga-jaga)
        if (!$lesson) {
            $this->command->error("Lesson 'Kata Benda' tidak ditemukan! Harap jalankan LessonSeeder terlebih dahulu.");
            return;
        }

        // 2. QUIZ (Buat Quiz untuk Lesson tersebut)
        $quiz = Quiz::firstOrCreate(
            ['lesson_id' => $lesson->id, 'title' => 'Quiz Kata Benda']
        );

        // 3. QUESTIONS (10 Soal Campuran)
        $questions = [
            // --- SOAL 1 (GAMBAR: BUKU) ---
            [
                'question' => 'Buku',
                // Pastikan kolom icon di tabel questions boleh NULL atau isi '-' jika error
                'icon'     => 'buku_illustration.png', 
                'options'  => [
                    ['가방 (ga-bang)', false],
                    ['책 (chaek)', true],
                    ['사람 (sa-ram)', false],
                    ['물 (mul)', false],
                ]
            ],
            // --- SOAL 2 (GAMBAR: TAS) ---
            [
                'question' => 'Tas',
                'icon'     => 'tas_illustration.png',
                'options'  => [
                    ['가방 (ga-bang)', true],
                    ['모자 (mo-ja)', false],
                    ['돈 (don)', false],
                    ['집 (jip)', false],
                ]
            ],
            // --- SOAL 3 (TEKS SAJA: SEKOLAH) ---
            [
                'question' => 'Apa bahasa Koreanya "Sekolah"?',
                'icon'     => null, // Tidak ada gambar
                'options'  => [
                    ['학교 (hak-gyo)', true],
                    ['학생 (hak-saeng)', false],
                    ['선생님 (seon-saeng-nim)', false],
                    ['의자 (ui-ja)', false],
                ]
            ],
            // --- SOAL 4 (GAMBAR: ORANG) ---
            [
                'question' => 'Orang',
                'icon'     => 'orang_illustration.png',
                'options'  => [
                    ['남자 (nam-ja)', false],
                    ['여자 (yeo-ja)', false],
                    ['사람 (sa-ram)', true],
                    ['아이 (a-i)', false],
                ]
            ],
            // --- SOAL 5 (TEKS SAJA: AIR) ---
            [
                'question' => 'Apa arti kata "물 (mul)"?',
                'icon'     => null, 
                'options'  => [
                    ['Api', false],
                    ['Angin', false],
                    ['Tanah', false],
                    ['Air', true],
                ]
            ],
            // --- SOAL 6 (GAMBAR: APEL) ---
            [
                'question' => 'Apel',
                'icon'     => 'apel_illustration.png',
                'options'  => [
                    ['사과 (sa-gwa)', true],
                    ['포도 (po-do)', false],
                    ['수박 (su-bak)', false],
                    ['딸기 (ttal-gi)', false],
                ]
            ],
            // --- SOAL 7 (TEKS SAJA: RUMAH) ---
            [
                'question' => 'Bahasa Korea dari "Rumah" adalah...',
                'icon'     => null,
                'options'  => [
                    ['방 (bang)', false],
                    ['집 (jip)', true],
                    ['문 (mun)', false],
                    ['창문 (chang-mun)', false],
                ]
            ],
            // --- SOAL 8 (GAMBAR: KUCING) ---
            [
                'question' => 'Kucing',
                'icon'     => 'kucing_illustration.png',
                'options'  => [
                    ['강아지 (gang-a-ji)', false],
                    ['고양이 (go-yang-i)', true],
                    ['새 (sae)', false],
                    ['물고기 (mul-go-gi)', false],
                ]
            ],
            // --- SOAL 9 (TEKS SAJA: UANG) ---
            [
                'question' => 'Apa arti kata "돈 (don)"?',
                'icon'     => null,
                'options'  => [
                    ['Emas', false],
                    ['Uang', true],
                    ['Perak', false],
                    ['Kertas', false],
                ]
            ],
            // --- SOAL 10 (TEKS SAJA: NAMA) ---
            [
                'question' => 'Bahasa Koreanya "Nama" adalah...',
                'icon'     => null,
                'options'  => [
                    ['이름 (i-reum)', true],
                    ['나이 (na-i)', false],
                    ['직업 (ji-geop)', false],
                    ['나라 (na-ra)', false],
                ]
            ],
        ];

        foreach ($questions as $q) {
            // Jika kolom icon di database questions wajib diisi (NOT NULL)
            // ganti $q['icon'] di bawah ini dengan: ($q['icon'] ?? '-')
            $question = Question::create([
                'quiz_id'  => $quiz->id,
                'question' => $q['question'],
                'icon'     => $q['icon'], 
            ]);

            foreach ($q['options'] as [$text, $correct]) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $text,
                    'is_correct'  => $correct,
                ]);
            }
        }
    }
}