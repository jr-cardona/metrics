<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SurveySeeder::class);
        $this->call(DimensionSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
