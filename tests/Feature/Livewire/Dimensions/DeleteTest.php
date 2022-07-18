<?php

namespace Tests\Feature\Livewire\Dimensions;

use App\Http\Livewire\Components\DeleteComponent;
use App\Models\Dimension;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use LazilyRefreshDatabase;

    /** @test */
    public function can_delete_dimensions()
    {
        $dimension = Dimension::factory()->create();

        $user = User::factory()->create();

        Livewire::actingAs($user)->test(DeleteComponent::getName(), ['model' => $dimension])
            ->call('delete')
            ->assertSessionHas('flash.bannerStyle', 'danger')
            ->assertSessionHas('flash.banner')
            ->assertRedirect(url()->previous());

        $this->assertNotNull($dimension->fresh()->deleted_at);
    }
}
