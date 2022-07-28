<?php

namespace Tests\Feature\Livewire\Questions;

use App\Http\Livewire\Questions\Index;
use App\Models\Question;
use App\Models\User;
use Tests\DBTestCase;

class IndexTest extends DBTestCase
{
    /** @test */
    public function guests_cannot_list_questions()
    {
        $this->get(route('questions.index'))
            ->assertRedirect('login');
    }

    /** @test */
    public function questions_index_component_renders_properly()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('questions.index'))
            ->assertSeeLivewire(Index::getName());
    }

    /** @test */
    public function component_shows_questions_properly()
    {
        $questions = Question::factory(10)->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('questions.index'))
            ->assertSeeLivewire(Index::getName());

        $questions->each(fn ($dimension) => $response->assertSeeText($dimension->name));
    }
}
