<?php

namespace Database\Seeders;

use App\Models\QuestionCategory;
use Illuminate\Database\Seeder;

class QuestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        QuestionCategory::create(['name' => 'Participant questions', 'code' => 'PQ']);
        QuestionCategory::create(['name' => 'Survey questions', 'code' => 'SQ']);
    }
}
