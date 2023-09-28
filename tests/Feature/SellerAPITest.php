<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Admin;
use Illuminate\Http\Response;
use Tests\TestCase;

class SellerAPITest extends TestCase
{
    /**
     * Testa a criação de um seller
     */
    public function test_creation_of_a_new_seller(): void
    {
        $admin = Admin::factory()->create();
        $apiToken = $admin->createToken('admin_token')->plainTextToken;

        $newSeller = [
            'name' => fake()->name,
            'email' => fake()->freeEmail(),
        ];

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$apiToken}",
            'Accept'        => 'application/json'
        ])->post(route('api.create.seller'), $newSeller);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'id',
                'name',
                'email'
            ]);
    }

    /**
     * Testa a criação de um seller com e-mail inválido
     */
    public function test_creation_of_seller_with_invalid_email(): void
    {
        $admin = Admin::factory()->create();
        $apiToken = $admin->createToken('admin_token')->plainTextToken;

        $newSeller = [
            'name' => fake()->name,
            'email' => fake()->name,
        ];

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$apiToken}",
            'Accept'        => 'application/json'
        ])->post(route('api.create.seller'), $newSeller);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
