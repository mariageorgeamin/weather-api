<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetWeatherRequest;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getWeather(GetWeatherRequest $request)
    {
        $city = $request->validated()['city'];
        $weatherData = $this->weatherService->getWeather($city);

        if (!$weatherData) {
            return response()->json(['error' => 'Weather data not found'], 404);
        }

        return response()->json(array_merge(['city' => $request->city], $weatherData));
    }
}
