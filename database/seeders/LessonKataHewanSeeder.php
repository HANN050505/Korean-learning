<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Vocabulary;

class LessonKataHewanSeeder extends Seeder
{
    public function run()
    {
        // 1. CARI ATAU BUAT LESSON BARU (Auto Create)
        // Kalau judul 'Kata Hewan' belum ada, dia bakal bikin baru otomatis.
        $lesson = Lesson::firstOrCreate(
            ['title' => 'Kata Hewan'], // Judul yang dicari
            [
                'description' => 'Belajar nama-nama hewan dalam Bahasa Korea',
                'level' => 'Beginner', 
                'image' => 'animals.jpg' // Gambar placeholder
            ]
        );

        // 2. Data Kosakata Hewan (50 Item)
        $vocabularies = [
            ['korean' => '개', 'latin' => 'gae', 'meaning' => 'Anjing'],
            ['korean' => '고양이', 'latin' => 'go-yang-i', 'meaning' => 'Kucing'],
            ['korean' => '토끼', 'latin' => 'to-kki', 'meaning' => 'Kelinci'],
            ['korean' => '햄스터', 'latin' => 'haem-seu-teo', 'meaning' => 'Hamster'],
            ['korean' => '소', 'latin' => 'so', 'meaning' => 'Sapi'],
            ['korean' => '돼지', 'latin' => 'dwae-ji', 'meaning' => 'Babi'],
            ['korean' => '닭', 'latin' => 'dak', 'meaning' => 'Ayam'],
            ['korean' => '양', 'latin' => 'yang', 'meaning' => 'Domba'],
            ['korean' => '염소', 'latin' => 'yeom-so', 'meaning' => 'Kambing'],
            ['korean' => '말', 'latin' => 'mal', 'meaning' => 'Kuda'],
            ['korean' => '오리', 'latin' => 'o-ri', 'meaning' => 'Bebek'],
            ['korean' => '거위', 'latin' => 'geo-wi', 'meaning' => 'Angsa'],
            ['korean' => '사자', 'latin' => 'sa-ja', 'meaning' => 'Singa'],
            ['korean' => '호랑이', 'latin' => 'ho-rang-i', 'meaning' => 'Harimau'],
            ['korean' => '코끼리', 'latin' => 'ko-kki-ri', 'meaning' => 'Gajah'],
            ['korean' => '기린', 'latin' => 'gi-rin', 'meaning' => 'Jerapah'],
            ['korean' => '원숭이', 'latin' => 'won-sung-i', 'meaning' => 'Monyet'],
            ['korean' => '곰', 'latin' => 'gom', 'meaning' => 'Beruang'],
            ['korean' => '늑대', 'latin' => 'neuk-dae', 'meaning' => 'Serigala'],
            ['korean' => '여우', 'latin' => 'yeo-u', 'meaning' => 'Rubah'],
            ['korean' => '사슴', 'latin' => 'sa-seum', 'meaning' => 'Rusa'],
            ['korean' => '뱀', 'latin' => 'baem', 'meaning' => 'Ular'],
            ['korean' => '캥거루', 'latin' => 'kaeng-geo-ru', 'meaning' => 'Kangaroo'],
            ['korean' => '얼룩말', 'latin' => 'eol-luk-mal', 'meaning' => 'Zebra'],
            ['korean' => '판다', 'latin' => 'pan-da', 'meaning' => 'Panda'],
            ['korean' => '쥐', 'latin' => 'jwi', 'meaning' => 'Tikus'],
            ['korean' => '물고기', 'latin' => 'mul-go-gi', 'meaning' => 'Ikan'],
            ['korean' => '고래', 'latin' => 'go-rae', 'meaning' => 'Paus'],
            ['korean' => '상어', 'latin' => 'sang-eo', 'meaning' => 'Hiu'],
            ['korean' => '돌고래', 'latin' => 'dol-go-rae', 'meaning' => 'Lumba-lumba'],
            ['korean' => '거북이', 'latin' => 'geo-buk-i', 'meaning' => 'Kura-kura'],
            ['korean' => '문어', 'latin' => 'mun-eo', 'meaning' => 'Gurita'],
            ['korean' => '오징어', 'latin' => 'o-jing-eo', 'meaning' => 'Cumi-cumi'],
            ['korean' => '게', 'latin' => 'ge', 'meaning' => 'Kepiting'],
            ['korean' => '새우', 'latin' => 'sae-u', 'meaning' => 'Udang'],
            ['korean' => '개구리', 'latin' => 'gae-gu-ri', 'meaning' => 'Katak'],
            ['korean' => '악어', 'latin' => 'ak-eo', 'meaning' => 'Buaya'],
            ['korean' => '하마', 'latin' => 'ha-ma', 'meaning' => 'Kuda Nil'],
            ['korean' => '새', 'latin' => 'sae', 'meaning' => 'Burung'],
            ['korean' => '부엉이', 'latin' => 'bu-eong-i', 'meaning' => 'Burung Hantu'],
            ['korean' => '펭귄', 'latin' => 'peng-gwin', 'meaning' => 'Pinguin'],
            ['korean' => '독수리', 'latin' => 'dok-su-ri', 'meaning' => 'Elang'],
            ['korean' => '나비', 'latin' => 'na-bi', 'meaning' => 'Kupu-kupu'],
            ['korean' => '벌', 'latin' => 'beol', 'meaning' => 'Lebah'],
            ['korean' => '모기', 'latin' => 'mo-gi', 'meaning' => 'Nyamuk'],
            ['korean' => '파리', 'latin' => 'pa-ri', 'meaning' => 'Lalat'],
            ['korean' => '개미', 'latin' => 'gae-mi', 'meaning' => 'Semut'],
            ['korean' => '거미', 'latin' => 'geo-mi', 'meaning' => 'Laba-laba'],
            ['korean' => '잠자리', 'latin' => 'jam-ja-ri', 'meaning' => 'Capung'],
            ['korean' => '바퀴벌레', 'latin' => 'ba-kwi-beol-le', 'meaning' => 'Kecoak'],
        ];

        // 3. Masukkan Vocab ke dalam Lesson tersebut
        foreach ($vocabularies as $vocab) {
            // firstOrCreate untuk menghindari duplikat data jika seeder dijalankan 2x
            Vocabulary::firstOrCreate(
                [
                    'lesson_id' => $lesson->id,
                    'korean' => $vocab['korean']
                ],
                [
                    'latin' => $vocab['latin'],
                    'meaning' => $vocab['meaning'],
                ]
            );
        }
    }
}