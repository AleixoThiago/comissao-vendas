<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Admin;
use Illuminate\Http\Response;
use Tests\TestCase;

class AdminAPITest extends TestCase
{
    /**
     * Testa a autenticação do admin
     */
    public function test_the_authentication_of_admin(): void
    {
        $admin = Admin::factory()->create();
        $apiToken = $admin->createToken('admin_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$apiToken}"
        ])->get(route('api.admin.auth'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
