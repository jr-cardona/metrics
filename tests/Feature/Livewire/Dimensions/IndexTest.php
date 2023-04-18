<?php

namespace Tests\Feature\Livewire\Dimensions;

use App\Http\Livewire\Dimensions\Index;
use App\Models\Dimension;
use App\Models\User;
use Tests\DBTestCase;

class IndexTest extends DBTestCase
{
    /** @test */
    public function guests_cannot_list_dimensions()
    {
        $this->get(route('dimensions.index'))
            ->assertRedirect('login');
    }

    /** @test */
    public function dimensions_index_component_renders_properly()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dimensions.index'))
            ->assertSeeLivewire(Index::getName());
    }

    /** @test */
    public function component_shows_dimensions_properly()
    {
        $dimensions = Dimension::factory(10)->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('dimensions.index'))
            ->assertSeeLivewire(Index::getName());

        $dimensions->each(fn ($dimension) => $response->assertSeeText($dimension->name));
    }
}
