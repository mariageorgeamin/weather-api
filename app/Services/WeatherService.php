<?php

namespace App\Services;

use App\Repositories\WeatherRepositoryInterface;

class WeatherService
{
    protected $weatherRepository;

    public function __construct(WeatherRepositoryInterface $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    public function getWeather($city)
    {
        return $this->weatherRepository->getWeather($city);
    }
}
