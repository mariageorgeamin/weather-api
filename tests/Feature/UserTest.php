<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        // Arrange: Prepare data for registration
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        // Act: Send POST request to register route
        $response = $this->postJson('/api/auth/register', $userData);

        // Assert: Check response status and structure
        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'token']);

        // Assert: Check that user is saved in the database
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_user_can_login()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('secret'),
        ]);

        $response = $this->postJson('/api/auth/login', [
            'email' => 'johndoe@example.com',
            'password' => 'secret',
        ]);

        $response->assertStatus(200);
        $this->assertArrayHasKey('token', $response->json());
    }

    public function test_user_can_logout()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('secret'),
        ]);

        $loginResponse = $this->postJson('/api/auth/login', [
            'email' => 'johndoe@example.com',
            'password' => 'secret',
        ]);

        $loginResponse->assertStatus(200);
        $token = $loginResponse->json('token');

        $logoutResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/auth/logout');


        $logoutResponse->assertStatus(200);
        $logoutResponse->assertJson(['message' => 'Successfully logged out']);
    }
}
