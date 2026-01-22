<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Vocabulary;

class LessonKataBuahSeeder extends Seeder
{
    public function run()
    {
        // 1. CARI LESSON YANG SUDAH ADA
        // Pastikan nama lesson di database kamu benar 'Kata Buah'
        // Atau jika kamu mengganti nama lessonnya jadi 'Buah & Sayur', ganti juga disini.
        $lesson = Lesson::where('title', 'Kata Buah')->first();

        // Jaga-jaga kalau Lessonnya belum ada
        if (!$lesson) {
            $this->command->error("Lesson 'Kata Buah' tidak ditemukan! Harap jalankan LessonSeeder terlebih dahulu.");
            return;
        }

        // 2. Data Kosakata (Buah & Sayur)
        $vocabularies = [
            // --- BUAH-BUAHAN ---
            ['korean' => '딸기', 'latin' => 'ttal-gi', 'meaning' => 'Strawberry'],
            ['korean' => '포도', 'latin' => 'po-do', 'meaning' => 'Anggur'],
            ['korean' => '파인애플', 'latin' => 'pain-ae-peul', 'meaning' => 'Nanas'],
            ['korean' => '사과', 'latin' => 'sa-gwa', 'meaning' => 'Apel'],
            ['korean' => '레몬', 'latin' => 'le-mon', 'meaning' => 'Lemon'],
            ['korean' => '멜론', 'latin' => 'mel-lon', 'meaning' => 'Melon'],
            ['korean' => '수박', 'latin' => 'su-bak', 'meaning' => 'Semangka'],
            ['korean' => '두리안', 'latin' => 'du-ri-an', 'meaning' => 'Durian'],
            ['korean' => '바나나', 'latin' => 'ba-na-na', 'meaning' => 'Pisang'],
            ['korean' => '오렌지', 'latin' => 'o-ren-ji', 'meaning' => 'Jeruk'],
            ['korean' => '아보카도', 'latin' => 'a-bo-ka-do', 'meaning' => 'Alpukat'],
            ['korean' => '망고', 'latin' => 'mang-go', 'meaning' => 'Mangga'],
            ['korean' => '코코넛', 'latin' => 'ko-ko-neot', 'meaning' => 'Kelapa'],
            ['korean' => '체리', 'latin' => 'che-ri', 'meaning' => 'Ceri'],
            ['korean' => '키위', 'latin' => 'ki-wi', 'meaning' => 'Kiwi'],
            ['korean' => '배', 'latin' => 'bae', 'meaning' => 'Pir'],
            ['korean' => '석류', 'latin' => 'seong-nyu', 'meaning' => 'Delima'],
            ['korean' => '자두', 'latin' => 'ja-du', 'meaning' => 'Plum'],
            ['korean' => '살구', 'latin' => 'sal-gu', 'meaning' => 'Apricot'],
            ['korean' => '구아바', 'latin' => 'gu-a-ba', 'meaning' => 'Jambu biji'], // Saya perbaiki latin jadi gu-a-ba
            ['korean' => '망고스틴', 'latin' => 'mang-go-seu-tin', 'meaning' => 'Manggis'],
            ['korean' => '파파야', 'latin' => 'pa-pa-ya', 'meaning' => 'Pepaya'],
            ['korean' => '블루베리', 'latin' => 'beul-lu-be-ri', 'meaning' => 'Blueberry'],
            ['korean' => '라즈베리', 'latin' => 'ra-jeu-be-ri', 'meaning' => 'Raspberry'],
            ['korean' => '리치', 'latin' => 'ri-chi', 'meaning' => 'Leci'],
            
            // --- SAYUR-SAYURAN ---
            ['korean' => '토마토', 'latin' => 'to-ma-to', 'meaning' => 'Tomat'],
            ['korean' => '당근', 'latin' => 'dang-geun', 'meaning' => 'Wortel'],
            ['korean' => '감자', 'latin' => 'gam-ja', 'meaning' => 'Kentang'],
            ['korean' => '고추', 'latin' => 'go-chu', 'meaning' => 'Cabai'],
            ['korean' => '오이', 'latin' => 'o-i', 'meaning' => 'Mentimun'],
            ['korean' => '상추', 'latin' => 'sang-chu', 'meaning' => 'Selada'],
            ['korean' => '브로콜리', 'latin' => 'beu-ro-kol-li', 'meaning' => 'Brokoli'],
            ['korean' => '시금치', 'latin' => 'si-geum-chi', 'meaning' => 'Bayam'],
            ['korean' => '파프리카', 'latin' => 'pa-peu-ri-ka', 'meaning' => 'Paprika'],
            ['korean' => '무', 'latin' => 'mu', 'meaning' => 'Lobak'],
            ['korean' => '양배추', 'latin' => 'yang-bae-chu', 'meaning' => 'Kol'],
            ['korean' => '샐러리', 'latin' => 'sael-leo-ri', 'meaning' => 'Seledri'],
            ['korean' => '파', 'latin' => 'pa', 'meaning' => 'Daun bawang'],
            ['korean' => '가지', 'latin' => 'ga-ji', 'meaning' => 'Terong'],
            ['korean' => '옥수수', 'latin' => 'ok-su-su', 'meaning' => 'Jagung'],
            ['korean' => '아스파라거스', 'latin' => 'a-seu-pa-ra-geo-seu', 'meaning' => 'Asparagus'],
            ['korean' => '완두콩', 'latin' => 'wan-du-kong', 'meaning' => 'Kacang polong'],
            ['korean' => '양파', 'latin' => 'yang-pa', 'meaning' => 'Bawang bombay'],
            ['korean' => '청경채', 'latin' => 'cheong-gyeong-chae', 'meaning' => 'Pakcoy'],
            ['korean' => '배추', 'latin' => 'bae-chu', 'meaning' => 'Sawi'],
            ['korean' => '콩나물', 'latin' => 'kong-na-mul', 'meaning' => 'Tauge'],
            ['korean' => '양배추', 'latin' => 'yang-bae-chu', 'meaning' => 'Kubis'], // Sama dengan Kol, tapi beda arti Indo
            ['korean' => '그린빈', 'latin' => 'geu-rin-bin', 'meaning' => 'Buncis'],
            ['korean' => '차요테', 'latin' => 'cha-yo-te', 'meaning' => 'Labu siam'],
        ];

        // 3. Masukkan Vocab ke dalam Lesson tersebut
        foreach ($vocabularies as $vocab) {
            Vocabulary::create([
                'lesson_id' => $lesson->id,
                'korean' => $vocab['korean'],
                'latin' => $vocab['latin'],
                'meaning' => $vocab['meaning'],
            ]);
        }
    }
}