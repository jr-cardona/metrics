<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Dimension;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DimensionController
 */
class DimensionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $dimensions = Dimension::factory()->count(3)->create();

        $response = $this->get(route('dimension.index'));

        $response->assertOk();
        $response->assertViewIs('dimension.index');
        $response->assertViewHas('dimensions');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('dimension.create'));

        $response->assertOk();
        $response->assertViewIs('dimension.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DimensionController::class,
            'store',
            \App\Http\Requests\DimensionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('dimension.store'), [
            'name' => $name,
        ]);

        $dimensions = Dimension::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $dimensions);
        $dimension = $dimensions->first();

        $response->assertRedirect(route('dimension.index'));
        $response->assertSessionHas('dimension.id', $dimension->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $dimension = Dimension::factory()->create();

        $response = $this->get(route('dimension.show', $dimension));

        $response->assertOk();
        $response->assertViewIs('dimension.show');
        $response->assertViewHas('dimension');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $dimension = Dimension::factory()->create();

        $response = $this->get(route('dimension.edit', $dimension));

        $response->assertOk();
        $response->assertViewIs('dimension.edit');
        $response->assertViewHas('dimension');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DimensionController::class,
            'update',
            \App\Http\Requests\DimensionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $dimension = Dimension::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('dimension.update', $dimension), [
            'name' => $name,
        ]);

        $dimension->refresh();

        $response->assertRedirect(route('dimension.index'));
        $response->assertSessionHas('dimension.id', $dimension->id);

        $this->assertEquals($name, $dimension->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $dimension = Dimension::factory()->create();

        $response = $this->delete(route('dimension.destroy', $dimension));

        $response->assertRedirect(route('dimension.index'));

        $this->assertSoftDeleted($dimension);
    }
}
