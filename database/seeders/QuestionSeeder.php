<?php

namespace Database\Seeders;

use App\Enums\DocumentTypes;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Question::createMany([
            [
                'number' => 1,
                'title' => 'Tipo de documento',
                'type' => 'select',
                'options' => DocumentTypes::array(),
            ],
            [
                'number' => 2,
                'title' => 'Número de documento',
                'type' => 'integer',
                'options' => [],
            ],
            [
                'number' => 3,
                'title' => 'Nombres',
                'type' => 'text',
                'options' => [],
            ],
            [
                'number' => 4,
                'title' => 'Apellidos',
                'type' => 'text',
                'options' => [],
            ],
            [
                'number' => 5,
                'title' => 'Institución',
                'type' => 'text',
                'options' => [],
            ]
        ]);
    }
}
