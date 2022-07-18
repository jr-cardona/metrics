<?php

namespace Tests\Feature\Livewire\Dimensions;

use App\Models\Dimension;
use App\Models\User;
use Tests\DBTestCase;

class DimensionShowTest extends DBTestCase
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
            ->assertSeeLivewire('dimensions.dimensions-show')
            ->assertSeeText(__('Create'));
    }
}
