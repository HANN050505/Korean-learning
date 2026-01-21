<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Vocabulary;

class LessonKataBendaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cari Lesson "Kata Benda" atau ambil yang pertama
        $lesson = Lesson::where('title', 'LIKE', '%Kata Benda%')->first() ?: Lesson::first(); 

        if (!$lesson) {
            $this->command->error("Data Lesson tidak ditemukan! Pastikan tabel lessons sudah ada isinya.");
            return;
        }

        // 2. Bersihkan vocab lama di lesson ini agar tidak double
        Vocabulary::where('lesson_id', $lesson->id)->delete();

        // 3. Daftar 50 Kata Benda sesuai permintaan
        $vocabs = [
            ['korean' => '가방', 'latin' => 'ga-bang', 'meaning' => 'Tas'],
            ['korean' => '책', 'latin' => 'chaek', 'meaning' => 'Buku'],
            ['korean' => '연필', 'latin' => 'yeon-pil', 'meaning' => 'Pensil'],
            ['korean' => '벽시계', 'latin' => 'byeok-si-gye', 'meaning' => 'Jam Dinding'],
            ['korean' => '선풍기', 'latin' => 'seon-pung-gi', 'meaning' => 'Kipas'],
            ['korean' => '컵', 'latin' => 'keop', 'meaning' => 'Cangkir'],
            ['korean' => '접시', 'latin' => 'jeop-si', 'meaning' => 'Piring'],
            ['korean' => '빗자루', 'latin' => 'bit-ja-ru', 'meaning' => 'Sapu'],
            ['korean' => '수건', 'latin' => 'su-geon', 'meaning' => 'Handuk'],
            ['korean' => '샌들', 'latin' => 'saen-deul', 'meaning' => 'Sandal'],
            ['korean' => '매트리스', 'latin' => 'mae-teu-ri-seu', 'meaning' => 'Kasur'],
            ['korean' => '베개', 'latin' => 'be-gae', 'meaning' => 'Bantal'],
            ['korean' => '바디필로우', 'latin' => 'ba-di-pil-lo-u', 'meaning' => 'Guling'],
            ['korean' => '신발', 'latin' => 'sin-bal', 'meaning' => 'Sepatu'],
            ['korean' => '책상', 'latin' => 'chaek-sang', 'meaning' => 'Meja'],
            ['korean' => '의자', 'latin' => 'ui-ja', 'meaning' => 'Kursi'],
            ['korean' => '숟가락', 'latin' => 'sut-ga-rak', 'meaning' => 'Sendok'],
            ['korean' => '포크', 'latin' => 'po-keu', 'meaning' => 'Garpu'],
            ['korean' => '거울', 'latin' => 'geo-ul', 'meaning' => 'Cermin'],
            ['korean' => '바지', 'latin' => 'ba-ji', 'meaning' => 'Celana'],
            ['korean' => '옷', 'latin' => 'ot', 'meaning' => 'Pakaian'],
            ['korean' => '빗', 'latin' => 'bit', 'meaning' => 'Sisir'],
            ['korean' => '모자', 'latin' => 'mo-ja', 'meaning' => 'Topi'],
            ['korean' => '안경', 'latin' => 'an-gyeong', 'meaning' => 'Kacamata'],
            ['korean' => '찬장', 'latin' => 'chan-jang', 'meaning' => 'Lemari'],
            ['korean' => '전등', 'latin' => 'jeon-deung', 'meaning' => 'Lampu'],
            ['korean' => '만년필', 'latin' => 'man-nyeon-pil', 'meaning' => 'Pulpen'],
            ['korean' => '칼', 'latin' => 'kal', 'meaning' => 'Pisau'],
            ['korean' => '지갑', 'latin' => 'ji-gap', 'meaning' => 'Dompet'],
            ['korean' => '재킷', 'latin' => 'jae-kit', 'meaning' => 'Jaket'],
            ['korean' => '우산', 'latin' => 'u-san', 'meaning' => 'Payung'],
            ['korean' => '양동이', 'latin' => 'yang-dong-i', 'meaning' => 'Ember'],
            ['korean' => '텔레비전', 'latin' => 'tel-le-bi-jeon', 'meaning' => 'Televisi'],
            ['korean' => '카메라', 'latin' => 'ka-me-ra', 'meaning' => 'Kamera'],
            ['korean' => '양말', 'latin' => 'yang-mal', 'meaning' => 'Kaos Kaki'],
            ['korean' => '문', 'latin' => 'mun', 'meaning' => 'Pintu'],
            ['korean' => '돌', 'latin' => 'dol', 'meaning' => 'Batu'],
            ['korean' => '인형', 'latin' => 'in-hyeong', 'meaning' => 'Boneka'],
            ['korean' => '공', 'latin' => 'gong', 'meaning' => 'Bola'],
            ['korean' => '울타리', 'latin' => 'ul-ta-ri', 'meaning' => 'Pagar'],
            ['korean' => '여행가방', 'latin' => 'yeo-haeng-ga-bang', 'meaning' => 'Koper'],
            ['korean' => '냉장고', 'latin' => 'naeng-jang-go', 'meaning' => 'Kulkas'],
            ['korean' => '양탄자', 'latin' => 'yang-tan-ja', 'meaning' => 'Karpet'],
            ['korean' => '바구니', 'latin' => 'ba-gu-ni', 'meaning' => 'Keranjang'],
            ['korean' => '액자', 'latin' => 'aek-ja', 'meaning' => 'Pigura'],
            ['korean' => '달력', 'latin' => 'dal-lyeok', 'meaning' => 'Kalender'],
            ['korean' => '바가지', 'latin' => 'ba-ga-ji', 'meaning' => 'Gayung'],
            ['korean' => '비누', 'latin' => 'bi-nu', 'meaning' => 'Sabun'],
            ['korean' => '담요', 'latin' => 'dam-yo', 'meaning' => 'Selimut'],
            ['korean' => '가위', 'latin' => 'ga-wi', 'meaning' => 'Gunting'],
        ];

        // 4. Masukkan ke Database
        foreach ($vocabs as $v) {
            Vocabulary::create([
                'lesson_id' => $lesson->id,
                'korean'    => $v['korean'],
                'latin'     => $v['latin'],
                'meaning'   => $v['meaning'],
            ]);
        }
        
        $this->command->info("Berhasil memasukkan 50 Kata Benda ke Lesson: " . $lesson->title);
    }
}