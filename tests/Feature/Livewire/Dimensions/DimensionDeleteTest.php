<?php

namespace Tests\Feature\Livewire\Dimensions;

use App\Models\Dimension;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DimensionDeleteTest extends TestCase
{
    use LazilyRefreshDatabase;

    /** @test */
    function can_delete_dimensions()
    {
        $dimension = Dimension::factory()->create();

        $user = User::factory()->create();

        Livewire::actingAs($user)->test('components.delete-modal', ['model' => $dimension])
            ->call('delete')
            ->assertSessionHas('flash.bannerStyle', 'danger')
            ->assertSessionHas('flash.banner')
            ->assertRedirect(url()->previous());

        $this->assertNotNull($dimension->fresh()->deleted_at);
    }
}
