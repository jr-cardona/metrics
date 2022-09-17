<?php

namespace Database\Seeders;

use App\Enums\DocumentTypes;
use App\Enums\QuestionCategories;
use App\Enums\QuestionTypes;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\Survey;
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
        $survey = Survey::first();
        $physicalAggressionDimension = Dimension::where('name', 'Agresión física')->value('id');
        $verbalAggressionDimension = Dimension::where('name', 'Agresión verbal')->value('id');
        $rageDimension = Dimension::where('name', 'Ira')->value('id');
        $hostilityDimension = Dimension::where('name', 'Hostilidad')->value('id');

        $survey->questions()->createMany([
            [
                'number' => 1,
                'title' => 'Algunas veces no controlo el impulso de golpear a otra persona.',
                'dimension_id' => $physicalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 4,
                'title' => 'Si me molestan mucho, le puedo pegar a otra persona.',
                'dimension_id' => $physicalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 8,
                'title' => 'Si alguien me pega, le respondo pegándole también.',
                'dimension_id' => $physicalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 15,
                'title' => 'Si tengo que recurrir a la violencia para proteger mis derechos, lo hago.',
                'dimension_id' => $physicalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 19,
                'title' => 'Hay personas que me causan tanta rabia, el punto de darnos golpes.',
                'dimension_id' => $physicalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 22,
                'title' => 'Le pego a otra persona cuando hay motivos.',
                'dimension_id' => $physicalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 25,
                'title' => 'He amenazado a gente que conozco.',
                'dimension_id' => $physicalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 5,
                'title' => 'Algunas veces no estoy de acuerdo con mis compañeros.',
                'dimension_id' => $verbalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 9,
                'title' => 'Cuando no estoy de acuerdo con mis amigos, alego abiertamente con ellos.',
                'dimension_id' => $verbalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 12,
                'title' => 'Cuando los demás no están de acuerdo conmigo, alego con ellos.',
                'dimension_id' => $verbalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 16,
                'title' => 'Mis amigos dicen que alego mucho.',
                'dimension_id' => $verbalAggressionDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 2,
                'title' => 'Me enojo rápidamente pero se me pasa enseguida.',
                'dimension_id' => $rageDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 6,
                'title' => 'Cuando las cosas no me salen bien, demuestro mi enojo.',
                'dimension_id' => $rageDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 10,
                'title' => 'Algunas veces me siento tan enojado como si estuviera a punto de estallar.',
                'dimension_id' => $rageDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 13,
                'title' => 'Me enojo con facilidad.',
                'dimension_id' => $rageDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 17,
                'title' => 'Algunos de mis amigos dicen que soy una persona impulsiva.',
                'dimension_id' => $rageDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 20,
                'title' => 'Algunas veces me enojo sin razón.',
                'dimension_id' => $rageDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 23,
                'title' => 'Tengo dificultades para controlar mi genio.',
                'dimension_id' => $rageDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 3,
                'title' => 'Me molesta la buena suerte que tienen otras personas.',
                'dimension_id' => $hostilityDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 7,
                'title' => 'En ocasiones, siendo que la vida me ha tratado injustamente.',
                'dimension_id' => $hostilityDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 11,
                'title' => 'Parece que siempre son otros los que tienen más suerte que yo.',
                'dimension_id' => $hostilityDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 14,
                'title' => 'Me pregunto por qué algunas veces me siento tan enojado por algunas cosas.',
                'dimension_id' => $hostilityDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 18,
                'title' => 'Sé que mis "amigos" hablan mal de mí a mis espaldas.',
                'dimension_id' => $hostilityDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 21,
                'title' => 'Desconfío de desconocidos demasiado amigables.',
                'dimension_id' => $hostilityDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 24,
                'title' => 'Algunas veces siento que las personas se están riendo de mí a mis espaldas.',
                'dimension_id' => $hostilityDimension,
                'category' => QuestionCategories::survey->name,
            ],
            [
                'number' => 26,
                'title' => 'Cuando los demás se muestran especialmente amigables, me pregunto qué intenciones tendrán.',
                'dimension_id' => $hostilityDimension,
                'category' => QuestionCategories::survey->name,
            ],
        ]);

        $survey->questions()->createMany([
            [
                'number' => 1,
                'title' => 'Tipo de documento',
                'type' => QuestionTypes::select->name,
                'options' => DocumentTypes::array(),
                'category' => QuestionCategories::participant->name,
            ],
            [
                'number' => 2,
                'title' => 'Número de documento',
                'code' => 'document',
                'type' => QuestionTypes::number->name,
                'category' => QuestionCategories::participant->name,
            ],
            [
                'number' => 3,
                'title' => 'Nombres',
                'type' => QuestionTypes::text->name,
                'category' => QuestionCategories::participant->name,
            ],
            [
                'number' => 4,
                'title' => 'Apellidos',
                'type' => QuestionTypes::text->name,
                'category' => QuestionCategories::participant->name,
            ],
            [
                'number' => 5,
                'title' => 'Institución',
                'type' => QuestionTypes::text->name,
                'category' => QuestionCategories::participant->name,
            ]
        ]);
    }
}
