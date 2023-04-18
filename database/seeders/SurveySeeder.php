<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Survey::create([
            'title' => 'CUESTIONARIO DE AGRESIÓN - AQ EN POBLACIÓN COLOMBIANA',
            'description' => '
                Lea atentamente cada una de las frases y marque con una X la que más se ajusta
                a su forma de ser. Recuerde que no hay respuestas buenas ni malas.
            ',
        ]);
    }
}
