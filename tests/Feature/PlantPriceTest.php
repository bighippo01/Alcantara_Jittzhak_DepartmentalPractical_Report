<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlantPriceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_stores_a_unit_price_above_the_old_column_limit(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('plants.store'), [
            'plant_name' => 'Large price plant',
            'category' => 'ornamental',
            'unit_price' => '123123123',
            'description' => 'Test description',
            'stock_status' => 'in stock',
        ])->assertRedirect(route('plants.index'));

        $this->assertDatabaseHas('plants', [
            'user_id' => $user->id,
            'plant_name' => 'Large price plant',
            'unit_price' => '123123123.00',
        ]);
    }

    public function test_it_rejects_a_unit_price_above_the_database_limit(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('plants.store'), [
            'plant_name' => 'Too expensive plant',
            'category' => 'ornamental',
            'unit_price' => '10000000000',
            'description' => 'Test description',
            'stock_status' => 'in stock',
        ])->assertSessionHasErrors('unit_price');

        $this->assertDatabaseCount('plants', 0);
    }
}
