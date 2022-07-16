<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Dimension;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DimensionController
 */
class DimensionControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $dimensions = Dimension::factory()->count(3)->create();

        $response = $this->get(route('dimensions.index'));

        $response->assertOk();
        $response->assertViewIs('dimensions.index');
        $response->assertViewHas('dimensions');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('dimensions.create'));

        $response->assertOk();
        $response->assertViewIs('dimensions.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        // TODO;
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('dimensions.store'), [
            'name' => $name,
        ]);

        $dimensions = Dimension::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $dimensions);
        $dimension = $dimensions->first();

        $response->assertRedirect(route('dimensions.index'));
        $response->assertSessionHas('dimensions.id', $dimension->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $dimension = Dimension::factory()->create();

        $response = $this->get(route('dimensions.show', $dimension));

        $response->assertOk();
        $response->assertViewIs('dimensions.show');
        $response->assertViewHas('dimensions');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $dimension = Dimension::factory()->create();

        $response = $this->get(route('dimensions.edit', $dimension));

        $response->assertOk();
        $response->assertViewIs('dimensions.edit');
        $response->assertViewHas('dimensions');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        // TODO;
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $dimension = Dimension::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('dimensions.update', $dimension), [
            'name' => $name,
        ]);

        $dimension->refresh();

        $response->assertRedirect(route('dimensions.index'));
        $response->assertSessionHas('dimensions.id', $dimension->id);

        $this->assertEquals($name, $dimension->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $dimension = Dimension::factory()->create();

        $response = $this->delete(route('dimensions.destroy', $dimension));

        $response->assertRedirect(route('dimensions.index'));

        $this->assertSoftDeleted($dimension);
    }
}
