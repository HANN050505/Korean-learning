<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizKataBuahSeeder extends Seeder
{
    public function run(): void
    {
        // 1. CARI LESSON (Kata Buah)
        $lesson = Lesson::where('title', 'Kata Buah')->first();

        // Validasi agar tidak error jika lesson belum ada
        if (!$lesson) {
            $this->command->error("Lesson 'Kata Buah' tidak ditemukan! Jalankan LessonKataBuahSeeder dulu.");
            return;
        }

        // 2. BUAT QUIZ
        // Kita pakai firstOrCreate agar tidak duplikat jika di-seed ulang
        $quiz = Quiz::firstOrCreate(
            ['lesson_id' => $lesson->id],
            ['title' => 'Quiz Buah-buahan']
        );

        // 3. DATA SOAL (Campuran Gambar & Teks)
        $questions = [
            // --- SOAL 1: APEL (Gambar) ---
            [
                'question' => 'Apel',
                'icon'     => 'apel_illustration.png', 
                'options'  => [
                    ['사과 (sa-gwa)', true],
                    ['오이 (o-i)', false],
                    ['포도 (po-do)', false],
                    ['우유 (u-yu)', false],
                ]
            ],
            // --- SOAL 2: PISANG (Gambar) ---
            [
                'question' => 'Pisang',
                'icon'     => 'pisang_illustration.png',
                'options'  => [
                    ['바나나 (ba-na-na)', true],
                    ['수박 (su-bak)', false],
                    ['레몬 (re-mon)', false],
                    ['딸기 (ttal-gi)', false],
                ]
            ],
            // --- SOAL 3: ANGGUR (Teks) ---
            [
                'question' => 'Bahasa Korea dari "Anggur" adalah...',
                'icon'     => null,
                'options'  => [
                    ['포도 (po-do)', true],
                    ['자두 (ja-du)', false],
                    ['감 (gam)', false],
                    ['배 (bae)', false],
                ]
            ],
            // --- SOAL 4: STROBERI (Gambar) ---
            [
                'question' => 'Stroberi',
                'icon'     => 'stroberi_illustration.png',
                'options'  => [
                    ['토마토 (to-ma-to)', false],
                    ['딸기 (ttal-gi)', true],
                    ['고추 (go-chu)', false],
                    ['체리 (che-ri)', false],
                ]
            ],
            // --- SOAL 5: SEMANGKA (Teks) ---
            [
                'question' => 'Apa arti dari kata "수박 (su-bak)"?',
                'icon'     => null,
                'options'  => [
                    ['Melon', false],
                    ['Semangka', true],
                    ['Pepaya', false],
                    ['Nanas', false],
                ]
            ],
            // --- SOAL 6: JERUK (Gambar) ---
            [
                'question' => 'Jeruk',
                'icon'     => 'jeruk_illustration.png',
                'options'  => [
                    ['오렌지 (o-ren-ji)', true],
                    ['망고 (mang-go)', false],
                    ['사과 (sa-gwa)', false],
                    ['복숭아 (bok-sung-a)', false],
                ]
            ],
            // --- SOAL 7: PERSIK (Teks) ---
            [
                'question' => 'Bahasa Korea dari "Persik" adalah...',
                'icon'     => null,
                'options'  => [
                    ['복숭아 (bok-sung-a)', true],
                    ['살구 (sal-gu)', false],
                    ['석류 (seong-nyu)', false],
                    ['대추 (dae-chu)', false],
                ]
            ],
            // --- SOAL 8: NANAS (Gambar) ---
            [
                'question' => 'Nanas',
                'icon'     => 'nanas_illustration.png',
                'options'  => [
                    ['파인애플 (pa-in-ae-peul)', true],
                    ['키위 (ki-wi)', false],
                    ['코코넛 (ko-ko-neot)', false],
                    ['두리안 (du-ri-an)', false],
                ]
            ],
            // --- SOAL 9: MANGGA (Teks) ---
            [
                'question' => 'Manakah penulisan Hangul untuk "Mangga"?',
                'icon'     => null,
                'options'  => [
                    ['망고 (mang-go)', true],
                    ['망가 (mang-ga)', false],
                    ['밍고 (ming-go)', false],
                    ['몽고 (mong-go)', false],
                ]
            ],
            // --- SOAL 10: MELON (Teks) ---
            [
                'question' => 'Apa arti dari kata "멜론 (mel-lon)"?',
                'icon'     => null,
                'options'  => [
                    ['Lemon', false],
                    ['Melon', true],
                    ['Markisa', false],
                    ['Manggis', false],
                ]
            ],
        ];

        // 4. EKSEKUSI INSERT DATA
        foreach ($questions as $q) {
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