<?php

namespace Database\Factories;

use App\Enums\QuestionTypes;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dimension;
use App\Models\Question;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'is_active' => $this->faker->boolean(),
            'type' => $this->faker->randomElement(QuestionTypes::names()),
            'number' => $this->faker->randomNumber(3),
            'description' => $this->faker->text(),
            'options' => '{}',
            'dimension_id' => Dimension::factory(),
        ];
    }
}
