<?php

namespace Database\Seeders;

use App\Models\Dimension;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Dimension::create([
            'name' => 'Agresión física',
            'description' => 'Se manifiesta a través del maltrato físico, infligiendo lesiones o daños al cuerpo de la otra persona (Solberg y Olweus, 2003).'
        ]);

        Dimension::create([
            'name' => 'Agresión verbal',
            'description' => 'Consiste en lanzar palabras ofensivas a la otra persona, llamarlas por calificativos despectivos, proferir amenazas, burlarse y hacer comentarios o rumores con la intención de que la otra persona se sienta ofendida (López, Sánchez, Rodríguez y Fernández, 2009).',
        ]);
        Dimension::create([
            'name' => 'Ira',
            'description' => 'Es definida como aquella sensación de disgusto causado por una ofensa o maltrato, generalmente se manifiesta a través de un deseo de combatir aquello que la origina (Weisinger, 1998).',
        ]);
        Dimension::create([
            'name' => 'Hostilidad',
            'description' => 'Entendida como todo juicio negativo hacia personas y objetos (Bus, 1961).',
        ]);
    }
}
