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
//        dd($request->all());
        $latitude = $request->input('lat');
        $longitude = $request->input('lon');

        $weatherData = $this->weatherService->getWeather($latitude, $longitude);

        return view('weather.result', ['weatherData' => $weatherData]);

//        return response()->json($weatherData);
    }

    public function showForm()
    {
        return view('weather.form');
    }

}


