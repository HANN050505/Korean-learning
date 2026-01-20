<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Vocabulary;

class LessonKataBendaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ambil Lesson pertama yang tersedia di database
        // Jika kamu ingin spesifik ke ID tertentu, gunakan Lesson::find(1);
        $lesson = Lesson::first(); 

        // 2. Proteksi jika ternyata tabel Lesson masih kosong
        if (!$lesson) {
            $this->command->error("Data Lesson tidak ditemukan! Jalankan LessonSeeder umum dulu.");
            return;
        }

        // 3. Bersihkan vocab lama agar tidak duplikat di Lesson tersebut
        Vocabulary::where('lesson_id', $lesson->id)->delete();

        $vocabs = [
            ['korean' => '책', 'latin' => 'chaek', 'meaning' => 'Buku'],
            ['korean' => '가방', 'latin' => 'ga-bang', 'meaning' => 'Tas'],
            ['korean' => '의자', 'latin' => 'ui-ja', 'meaning' => 'Kursi'], // Perbaikan typo 'ui-ja'
            ['korean' => '책상', 'latin' => 'chaek-sang', 'meaning' => 'Meja'],
            ['korean' => '시계', 'latin' => 'si-gye', 'meaning' => 'Jam'],
            ['korean' => '모자', 'latin' => 'mo-ja', 'meaning' => 'Topi'],
            ['korean' => '연필', 'latin' => 'yeon-pil', 'meaning' => 'Pensil'],
            ['korean' => '안경', 'latin' => 'an-gyeong', 'meaning' => 'Kacamata'],
            ['korean' => '우산', 'latin' => 'u-san', 'meaning' => 'Payung'],
            ['korean' => '지우개', 'latin' => 'ji-u-gae', 'meaning' => 'Penghapus'],
        ];

        foreach ($vocabs as $v) {
            Vocabulary::create([
                'lesson_id' => $lesson->id,
                'korean'    => $v['korean'],
                'latin'     => $v['latin'],
                'meaning'   => $v['meaning'],
            ]);
        }
        
        $this->command->info("Vocab berhasil ditambahkan ke Lesson: " . $lesson->title);
    }
}