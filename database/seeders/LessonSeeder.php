<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        Lesson::insert([
            [
                'title' => 'Kata Benda',
                'description' => 'Kosakata benda sehari-hari dalam Bahasa Korea.',
                'icon' => 'images/icons/benda.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kata Buah',
                'description' => 'Nama-nama buah dalam Bahasa Korea.',
                'icon' => 'images/icons/buah.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kata Hewan',
                'description' => 'Kosakata nama hewan dalam Bahasa Korea.',
                'icon' => 'images/icons/hewan.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kata Perasaan',
                'description' => 'Kosakata untuk mengekspresikan perasaan.',
                'icon' => 'images/icons/perasaan.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kata Keluarga',
                'description' => 'Kosakata anggota keluarga dalam Bahasa Korea.',
                'icon' => 'images/icons/keluarga.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kata Tempat Umum',
                'description' => 'Kosakata tempat umum yang sering digunakan.',
                'icon' => 'images/icons/tempat-umum.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kata Waktu',
                'description' => 'Kosakata yang berkaitan dengan waktu.',
                'icon' => 'images/icons/waktu.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ungkapan Dasar',
                'description' => 'Ungkapan dasar dalam percakapan Bahasa Korea.',
                'icon' => 'images/icons/ungkapan-dasar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kata Kerja',
                'description' => 'Kosakata kata kerja dasar Bahasa Korea.',
                'icon' => 'images/icons/kerja.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kata Sifat',
                'description' => 'Kosakata kata sifat Bahasa Korea.',
                'icon' => 'images/icons/sifat.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
