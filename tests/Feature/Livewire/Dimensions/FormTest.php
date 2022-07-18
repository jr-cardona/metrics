<?php

namespace Tests\Feature\Livewire\Dimensions;

use App\Http\Livewire\Dimensions\Form;
use App\Models\Dimension;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\DBTestCase;

class FormTest extends DBTestCase
{
    /** @test */
    public function guests_cannot_create_or_update_dimensions()
    {
        $this->get(route('dimensions.create'))
            ->assertRedirect('login');

        $dimension = Dimension::factory()->create();

        $this->get($dimension->url()->edit())
            ->assertRedirect('login');
    }

    /** @test */
    public function dimension_form_renders_properly()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('dimensions.create'))
            ->assertSeeLivewire(Form::getName())
            ->assertSeeText(__('Create'));

        $dimension = Dimension::factory()->create();

        $this->actingAs($user)->get($dimension->url()->edit())
            ->assertSeeLivewire(Form::getName())
            ->assertSeeText(__('Edit'))
            ->assertSeeText($dimension->name);
    }

    /** @test */
    public function blade_template_is_wired_properly()
    {
        Livewire::test(Form::getName())
            ->assertSeeHtml('wire:submit.prevent="save"')
            ->assertSeeHtml('wire:model="dimension.name"');
    }

    /** @test */
    public function can_create_new_dimensions()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Form::getName())
            ->set('dimension.name', 'New dimension')
            ->call('save')
            ->assertSessionHas('flash.banner')
            ->assertRedirect(route('dimensions.index'));

        $this->assertDatabaseHas('dimensions', [
            'name' => 'New dimension',
        ]);
    }

    /** @test */
    public function can_update_dimensions()
    {
        $dimension = Dimension::factory()->create();

        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Form::getName(), ['dimension' => $dimension])
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
    public function name_is_required()
    {
        Livewire::test(Form::getName())
            ->set('dimension.name', '')
            ->call('save')
            ->assertHasErrors(['dimension.name' => 'required'])
            ->assertSeeHtml(__('validation.required', ['attribute' => 'name']));
    }

    /** @test */
    public function name_must_be_255_characters_max()
    {
        Livewire::test(Form::getName())
            ->set('dimension.name', Str::random(256))
            ->call('save')
            ->assertHasErrors(['dimension.name' => 'max:255'])
            ->assertSeeHtml(__('validation.max.string', [
                'attribute' => 'name',
                'max' => 255
            ]));
    }

    /** @test */
    public function real_time_validation_works_for_name()
    {
        Livewire::test(Form::getName())
            ->set('dimension.name', '')
            ->assertHasErrors(['dimension.name' => 'required'])
            ->set('dimension.name', Str::random(256))
            ->assertHasErrors(['dimension.name' => 'max:255'])
            ->set('dimension.name', 'New Dimension')
            ->assertHasNoErrors('dimension.name');
    }
}
