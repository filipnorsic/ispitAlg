<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorsRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_authors_route_returns_200()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $response = $this->actingAs($user)->get('/authors');

        // Assert the status is 200
        $response->assertStatus(200);
    }
}
