<?php

namespace App\Services;

use App\Interfaces\WeatherInterface;
use Illuminate\Support\Facades\Http;

class OpenWeatherApiService implements WeatherInterface
{
    public function getWeather($lat, $lon, $apiKey)
    {
//        dd($apiKey);
        if (empty($apiKey)) {
            $apiKey = config('services.openweathermap.api_key');
        }
//  this is paid plan, endpoint doesn't work on free version
//        $response = Http::get("https://api.openweathermap.org/data/3.0/onecall", [
        $response = Http::get("http://api.openweathermap.org/data/2.5/weather", [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $apiKey,
        ]);

        return $response->json();
    }
}
