<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call(LessonSeeder::class);
    $this->call(QuizKataBendaSeeder::class);
    $this->call(LessonKataBendaSeeder::class);
    $this->call(LessonKataBuahSeeder::class);
    $this->call(QuizKataBuahSeeder::class);
}

}
