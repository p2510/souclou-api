<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameQuizchallenge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GameQuizchallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GameQuizchallenge::factory(500)->create();
    }
}