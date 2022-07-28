<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AnswerQuestion;
use App\Models\Participant;
use App\Models\Question;

class AnswerQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AnswerQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'value' => $this->faker->word,
            'question_id' => Question::factory(),
            'participant_id' => Participant::factory(),
        ];
    }
}
