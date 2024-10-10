<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class WeatherRepository implements WeatherRepositoryInterface
{
    protected $apiKey;

    // Mocked weather data
    protected $mockedWeatherData = [
        'Cairo' => ['temperature' => '30°C', 'humidity' => '50%', 'conditions' => 'Clear sky'],
        'New York' => ['temperature' => '20°C', 'humidity' => '60%', 'conditions' => 'Partly cloudy'],
        'London' => ['temperature' => '15°C', 'humidity' => '70%', 'conditions' => 'Rain'],
        'Tokyo' => ['temperature' => '25°C', 'humidity' => '55%', 'conditions' => 'Sunny'],
    ];

    public function __construct()
    {
        $this->apiKey = env('OPENWEATHER_API_KEY');
    }

    public function getWeather($city)
    {
        /*
         * Real API call
         *
         *
         *
         return Cache::remember("weather.$city", 60, function () use ($city) {
             $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            return [
                'temperature' => $response->json('main.temp') . '°C',
                'humidity' => $response->json('main.humidity') . '%',
                'conditions' => $response->json('weather.0.description'),
            ];
        }

        return null;
        });
        *
        *
        */

        //Mocked Data

        // Check if data is cached
        return Cache::remember("weather.$city", 60, function () use ($city) {
            return $this->mockedWeatherData[$city] ?? null;
        });
    }
}
