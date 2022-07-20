<?php

namespace Database\Seeders;

use App\Enums\DocumentTypes;
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
        $surveyId = Survey::query()->value('id');

        $participantInformation = Dimension::create(['name' => 'Información del participante', 'survey_id' => $surveyId]);
        $physicalAggression = Dimension::create(['name' => 'Agresión física', 'survey_id' => $surveyId]);
        $verbalAggression = Dimension::create(['name' => 'Agresión verbal', 'survey_id' => $surveyId]);
        $rage = Dimension::create(['name' => 'Ira', 'survey_id' => $surveyId]);
        $hostility = Dimension::create(['name' => 'Hostilidad', 'survey_id' => $surveyId]);

        $participantInformation->questions()->createMany([
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

        $physicalAggression->questions()->createMany([
            [
                'number' => 1,
                'title' => 'Algunas veces no controlo el impulso de golpear a otra persona.',
            ],
            [
                'number' => 4,
                'title' => 'Si me molestan mucho, le puedo pegar a otra persona.',
            ],
            [
                'number' => 8,
                'title' => 'Si alguien me pega, le respondo pegándole también.',
            ],
            [
                'number' => 15,
                'title' => 'Si tengo que recurrir a la violencia para proteger mis derechos, lo hago.',
            ],
            [
                'number' => 19,
                'title' => 'Hay personas que me causan tanta rabia, el punto de darnos golpes.',
            ],
            [
                'number' => 22,
                'title' => 'Le pego a otra persona cuando hay motivos.',
            ],
            [
                'number' => 25,
                'title' => 'He amenazado a gente que conozco.',
            ],
        ]);

        $verbalAggression->questions()->createMany([
            [
                'number' => 5,
                'title' => 'Algunas veces no estoy de acuerdo con mis compañeros.',
            ],
            [
                'number' => 9,
                'title' => 'Cuando no estoy de acuerdo con mis amigos, alego abiertamente con ellos.',
            ],
            [
                'number' => 12,
                'title' => 'Cuando los demás no están de acuerdo conmigo, alego con ellos.',
            ],
            [
                'number' => 16,
                'title' => 'Mis amigos dicen que alego mucho.',
            ],
        ]);

        $rage->questions()->createMany([
            [
                'number' => 2,
                'title' => 'Me enojo rápidamente pero se me pasa enseguida.',
            ],
            [
                'number' => 6,
                'title' => 'Cuando las cosas no me salen bien, demuestro mi enojo.',
            ],
            [
                'number' => 10,
                'title' => 'Algunas veces me siento tan enojado como si estuviera a punto de estallar.',
            ],
            [
                'number' => 13,
                'title' => 'Me enojo con facilidad.',
            ],
            [
                'number' => 17,
                'title' => 'Algunos de mis amigos dicen que soy una persona impulsiva.',
            ],
            [
                'number' => 20,
                'title' => 'Algunas veces me enojo sin razón.',
            ],
            [
                'number' => 23,
                'title' => 'Tengo dificultades para controlar mi genio.',
            ],
        ]);

        $hostility->questions()->createMany([
            [
                'number' => 3,
                'title' => 'Me molesta la buena suerte que tienen otras personas.',
            ],
            [
                'number' => 7,
                'title' => 'En ocasiones, siendo que la vida me ha tratado injustamente.',
            ],
            [
                'number' => 11,
                'title' => 'Parece que siempre son otros los que tienen más suerte que yo.',
            ],
            [
                'number' => 14,
                'title' => 'Me pregunto por qué algunas veces me siento tan enojado por algunas cosas.',
            ],
            [
                'number' => 18,
                'title' => 'Sé que mis "amigos" hablan mal de mí a mis espaldas.',
            ],
            [
                'number' => 21,
                'title' => 'Desconfío de desconocidos demasiado amigables.',
            ],
            [
                'number' => 24,
                'title' => 'Algunas veces siento que las personas se están riendo de mí a mis espaldas.',
            ],
            [
                'number' => 26,
                'title' => 'Cuando los demás se muestran especialmente amigables, me pregunto qué intenciones tendrán.',
            ],
        ]);
    }
}
