<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\QuestionController
 */
class QuestionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $questions = Question::factory()->count(3)->create();

        $response = $this->get(route('question.index'));

        $response->assertOk();
        $response->assertViewIs('question.index');
        $response->assertViewHas('questions');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('question.create'));

        $response->assertOk();
        $response->assertViewIs('question.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\QuestionController::class,
            'store',
            \App\Http\Requests\QuestionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $title = $this->faker->sentence(4);
        $is_active = $this->faker->boolean;
        $type = $this->faker->randomElement(/** enum_attributes **/);
        $number = $this->faker->randomNumber();

        $response = $this->post(route('question.store'), [
            'title' => $title,
            'is_active' => $is_active,
            'type' => $type,
            'number' => $number,
        ]);

        $questions = Question::query()
            ->where('title', $title)
            ->where('is_active', $is_active)
            ->where('type', $type)
            ->where('number', $number)
            ->get();
        $this->assertCount(1, $questions);
        $question = $questions->first();

        $response->assertRedirect(route('question.index'));
        $response->assertSessionHas('question.id', $question->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $question = Question::factory()->create();

        $response = $this->get(route('question.show', $question));

        $response->assertOk();
        $response->assertViewIs('question.show');
        $response->assertViewHas('question');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $question = Question::factory()->create();

        $response = $this->get(route('question.edit', $question));

        $response->assertOk();
        $response->assertViewIs('question.edit');
        $response->assertViewHas('question');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\QuestionController::class,
            'update',
            \App\Http\Requests\QuestionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $question = Question::factory()->create();
        $title = $this->faker->sentence(4);
        $is_active = $this->faker->boolean;
        $type = $this->faker->randomElement(/** enum_attributes **/);
        $number = $this->faker->randomNumber();

        $response = $this->put(route('question.update', $question), [
            'title' => $title,
            'is_active' => $is_active,
            'type' => $type,
            'number' => $number,
        ]);

        $question->refresh();

        $response->assertRedirect(route('question.index'));
        $response->assertSessionHas('question.id', $question->id);

        $this->assertEquals($title, $question->title);
        $this->assertEquals($is_active, $question->is_active);
        $this->assertEquals($type, $question->type);
        $this->assertEquals($number, $question->number);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $question = Question::factory()->create();

        $response = $this->delete(route('question.destroy', $question));

        $response->assertRedirect(route('question.index'));

        $this->assertSoftDeleted($question);
    }
}
