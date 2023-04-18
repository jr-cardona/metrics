<?php

namespace Database\Factories;

use App\Enums\QuestionCategories;
use App\Enums\QuestionTypes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\Survey;

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
            'code' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'number' => $this->faker->randomNumber(3),
            'is_active' => $this->faker->boolean,
            'dimension_id' => Dimension::factory(),
            'survey_id' => Survey::factory(),
            'type' => $this->faker->randomElement(QuestionTypes::names()),
            'category' => $this->faker->randomElement(QuestionCategories::names()),
        ];
    }
}
