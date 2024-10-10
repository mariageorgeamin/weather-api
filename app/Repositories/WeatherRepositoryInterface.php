<?php

namespace App\Repositories;

interface WeatherRepositoryInterface
{
    public function getWeather($city);
}
