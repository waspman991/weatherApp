<?php

namespace App\Http\Controllers;


use App\Http\Requests\WeatherRequest;
use App\Services\OpenWeatherApiService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(OpenWeatherApiService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getWeather(WeatherRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $latitude =  $validatedData['lat'];
            $longitude = $validatedData['lon'];
            $apiKey = $validatedData['api_key'];

            $weatherData = $this->weatherService->getWeather($latitude, $longitude, $apiKey);

            return view('weather.result', ['weatherData' => $weatherData]);
        } catch (\Exception $e) {
            // redirect to initial form with error message
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function showForm()
    {
        return view('weather.form');
    }

}


