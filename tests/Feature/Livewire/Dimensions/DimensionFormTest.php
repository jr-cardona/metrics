<?php

namespace Tests\Feature\Livewire\Dimensions;

use App\Models\Dimension;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\DBTestCase;

class DimensionFormTest extends DBTestCase
{
    /** @test */
    function guests_cannot_create_or_update_dimensions()
    {
        $this->get(route('dimensions.create'))
            ->assertRedirect('login');

        $dimension = Dimension::factory()->create();

        $this->get($dimension->url()->edit())
            ->assertRedirect('login');
    }

    /** @test */
    function dimension_form_renders_properly()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('dimensions.create'))
            ->assertSeeLivewire('dimensions.dimensions-form')
            ->assertSeeText(__('Create'));

        $dimension = Dimension::factory()->create();

        $this->actingAs($user)->get($dimension->url()->edit())
            ->assertSeeLivewire('dimensions.dimensions-form')
            ->assertSeeText(__('Edit'))
            ->assertSeeText($dimension->name);
    }

    /** @test */
    function blade_template_is_wired_properly()
    {
        Livewire::test('dimensions.dimensions-form')
            ->assertSeeHtml('wire:submit.prevent="save"')
            ->assertSeeHtml('wire:model="dimension.name"');
    }

    /** @test */
    function can_create_new_dimensions()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test('dimensions.dimensions-form')
            ->set('dimension.name', 'New dimension')
            ->call('save')
            ->assertSessionHas('flash.banner')
            ->assertRedirect(route('dimensions.index'));

        $this->assertDatabaseHas('dimensions', [
            'name' => 'New dimension',
        ]);
    }

    /** @test */
    function can_update_dimensions()
    {
        $dimension = Dimension::factory()->create();

        $user = User::factory()->create();

        Livewire::actingAs($user)->test('dimensions.dimensions-form', ['dimension' => $dimension])
            ->assertSet('dimension.name', $dimension->name)
            ->set('dimension.name', 'Updated name')
            ->call('save')
            ->assertRedirect(route('dimensions.index'));

        $this->assertDatabaseCount('dimensions', 1);

        $this->assertDatabaseHas('dimensions', [
            'name' => 'Updated name',
        ]);
    }

    /** @test */
    function name_is_required()
    {
        Livewire::test('dimensions.dimensions-form')
            ->set('dimension.name', '')
            ->call('save')
            ->assertHasErrors(['dimension.name' => 'required'])
            ->assertSeeHtml(__('validation.required', ['attribute' => 'name']));
    }

    /** @test */
    function name_must_be_255_characters_max()
    {
        Livewire::test('dimensions.dimensions-form')
            ->set('dimension.name', Str::random(256))
            ->call('save')
            ->assertHasErrors(['dimension.name' => 'max:255'])
            ->assertSeeHtml(__('validation.max.string', [
                'attribute' => 'name',
                'max' => 255
            ]));
    }

    /** @test */
    function real_time_validation_works_for_name()
    {
        Livewire::test('dimensions.dimensions-form')
            ->set('dimension.name', '')
            ->assertHasErrors(['dimension.name' => 'required'])
            ->set('dimension.name', Str::random(256))
            ->assertHasErrors(['dimension.name' => 'max:255'])
            ->set('dimension.name', 'New Dimension')
            ->assertHasNoErrors('dimension.name');
    }
}
