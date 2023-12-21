<?php

namespace App\Services;

use App\Interfaces\WeatherInterface;
use Illuminate\Support\Facades\Http;

class OpenWeatherApiService implements WeatherInterface
{
    public function getWeather($lat, $lon)
    {
        $apiKey = config('services.openweathermap.api_key');

        $response = Http::get("https://api.openweathermap.org/data/3.0/onecall", [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $apiKey,
        ]);

        return $response->json();
    }
}
