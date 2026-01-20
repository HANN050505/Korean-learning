<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Vocabulary;

class LessonKataBuahSeeder extends Seeder
{
    public function run()
    {
        // 1. CARI LESSON YANG SUDAH ADA (Jangan Create baru)
        // Kita cari berdasarkan judul 'Kata Buah' yang sudah dibuat di LessonSeeder
        $lesson = Lesson::where('title', 'Kata Buah')->first();

        // Jaga-jaga kalau Lessonnya belum ada
        if (!$lesson) {
            $this->command->error("Lesson 'Kata Buah' tidak ditemukan! Harap jalankan LessonSeeder terlebih dahulu.");
            return;
        }

        // 2. Data Buah
        $fruits = [
            ['korean' => '사과', 'latin' => 'sa-gwa', 'meaning' => 'Apel'],
            ['korean' => '바나나', 'latin' => 'ba-na-na', 'meaning' => 'Pisang'],
            ['korean' => '포도', 'latin' => 'po-do', 'meaning' => 'Anggur'],
            ['korean' => '딸기', 'latin' => 'ttal-gi', 'meaning' => 'Stroberi'],
            ['korean' => '수박', 'latin' => 'su-bak', 'meaning' => 'Semangka'],
            ['korean' => '오렌지', 'latin' => 'o-ren-ji', 'meaning' => 'Jeruk'],
            ['korean' => '복숭아', 'latin' => 'bok-sung-a', 'meaning' => 'Persik'],
            ['korean' => '파인애플', 'latin' => 'pa-in-ae-peul', 'meaning' => 'Nanas'],
            ['korean' => '망고', 'latin' => 'mang-go', 'meaning' => 'Mangga'],
            ['korean' => '멜론', 'latin' => 'mel-lon', 'meaning' => 'Melon'],
        ];

        // 3. Masukkan Vocab ke dalam Lesson tersebut
        foreach ($fruits as $fruit) {
            Vocabulary::create([
                'lesson_id' => $lesson->id, // Pakai ID dari lesson yang ditemukan
                'korean' => $fruit['korean'],
                'latin' => $fruit['latin'],
                'meaning' => $fruit['meaning'],
            ]);
        }
    }
}