<?php

namespace Database\Seeders;

use App\Enums\DocumentTypes;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\QuestionCategory;
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
        $surveyQuestionCategory = QuestionCategory::where(['code' => 'SQ'])->value('id');

        Dimension::where('code', 'AF')->questions()->createMany([
            [
                'number' => 1,
                'title' => 'Algunas veces no controlo el impulso de golpear a otra persona.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 4,
                'title' => 'Si me molestan mucho, le puedo pegar a otra persona.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 8,
                'title' => 'Si alguien me pega, le respondo pegándole también.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 15,
                'title' => 'Si tengo que recurrir a la violencia para proteger mis derechos, lo hago.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 19,
                'title' => 'Hay personas que me causan tanta rabia, el punto de darnos golpes.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 22,
                'title' => 'Le pego a otra persona cuando hay motivos.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 25,
                'title' => 'He amenazado a gente que conozco.',
                'category_id' => $surveyQuestionCategory,
            ],
        ]);

        Dimension::where('code', 'AV')->questions()->createMany([
            [
                'number' => 5,
                'title' => 'Algunas veces no estoy de acuerdo con mis compañeros.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 9,
                'title' => 'Cuando no estoy de acuerdo con mis amigos, alego abiertamente con ellos.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 12,
                'title' => 'Cuando los demás no están de acuerdo conmigo, alego con ellos.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 16,
                'title' => 'Mis amigos dicen que alego mucho.',
                'category_id' => $surveyQuestionCategory,
            ],
        ]);

        Dimension::where('code', 'IR')->questions()->createMany([
            [
                'number' => 2,
                'title' => 'Me enojo rápidamente pero se me pasa enseguida.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 6,
                'title' => 'Cuando las cosas no me salen bien, demuestro mi enojo.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 10,
                'title' => 'Algunas veces me siento tan enojado como si estuviera a punto de estallar.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 13,
                'title' => 'Me enojo con facilidad.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 17,
                'title' => 'Algunos de mis amigos dicen que soy una persona impulsiva.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 20,
                'title' => 'Algunas veces me enojo sin razón.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 23,
                'title' => 'Tengo dificultades para controlar mi genio.',
                'category_id' => $surveyQuestionCategory,
            ],
        ]);

        Dimension::where('code', 'HO')->questions()->createMany([
            [
                'number' => 3,
                'title' => 'Me molesta la buena suerte que tienen otras personas.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 7,
                'title' => 'En ocasiones, siendo que la vida me ha tratado injustamente.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 11,
                'title' => 'Parece que siempre son otros los que tienen más suerte que yo.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 14,
                'title' => 'Me pregunto por qué algunas veces me siento tan enojado por algunas cosas.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 18,
                'title' => 'Sé que mis "amigos" hablan mal de mí a mis espaldas.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 21,
                'title' => 'Desconfío de desconocidos demasiado amigables.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 24,
                'title' => 'Algunas veces siento que las personas se están riendo de mí a mis espaldas.',
                'category_id' => $surveyQuestionCategory,
            ],
            [
                'number' => 26,
                'title' => 'Cuando los demás se muestran especialmente amigables, me pregunto qué intenciones tendrán.',
                'category_id' => $surveyQuestionCategory,
            ],
        ]);

        $participantQuestionCategory = QuestionCategory::where(['code' => 'PQ'])->value('id');


        Question::createMany([
            [
                'number' => 1,
                'title' => 'Tipo de documento',
                'category_id' => $participantQuestionCategory,
                'type' => 'select',
                'options' => DocumentTypes::array(),
            ],
            [
                'number' => 2,
                'title' => 'Número de documento',
                'category_id' => $participantQuestionCategory,
                'type' => 'integer',
                'options' => [],
            ],
            [
                'number' => 3,
                'title' => 'Nombres',
                'category_id' => $participantQuestionCategory,
                'type' => 'text',
                'options' => [],
            ],
            [
                'number' => 4,
                'title' => 'Apellidos',
                'category_id' => $participantQuestionCategory,
                'type' => 'text',
                'options' => [],
            ],
            [
                'number' => 5,
                'title' => 'Institución',
                'category_id' => $participantQuestionCategory,
                'type' => 'text',
                'options' => [],
            ]
        ]);
    }
}
