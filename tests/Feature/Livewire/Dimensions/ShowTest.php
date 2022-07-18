<?php

namespace Tests\Feature\Livewire\Dimensions;

use App\Http\Livewire\Dimensions\Show;
use App\Models\Dimension;
use App\Models\User;
use Tests\DBTestCase;

class ShowTest extends DBTestCase
{
    /** @test */
    public function guests_cannot_view_dimensions()
    {
        $dimension = Dimension::factory()->create();

        $this->get($dimension->url()->show())
            ->assertRedirect('login');
    }

    /** @test */
    public function dimension_show_renders_properly()
    {
        $dimension = Dimension::factory()->create();

        $user = User::factory()->create();

        $this->actingAs($user)->get($dimension->url()->show())
            ->assertSeeLivewire(Show::getName())
            ->assertSeeText(__('Create'));
    }
}
