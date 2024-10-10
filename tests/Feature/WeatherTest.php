<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class WeatherTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_get_weather()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->getJson('/api/weather?city=Cairo', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'city' => 'Cairo',
            'temperature' => '30°C',
            'humidity' => '50%',
            'conditions' => 'Clear sky',
        ]);
    }

    public function test_authenticated_user_gets_404_for_unknown_city()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->getJson('/api/weather?city=UnknownCity', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(404);
        $response->assertJson(['error' => 'Weather data not found']);
    }
}
