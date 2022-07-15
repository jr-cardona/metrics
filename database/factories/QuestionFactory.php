<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
            'is_active' => $this->faker->boolean,
            'type' => $this->faker->randomElement(["text","textarea","checkbox","check","date","datetime","select","integer","radiobutton","phone","email","url"]),
            'number' => $this->faker->randomNumber(),
            'dimension_id' => Dimension::factory(),
        ];
    }
}
