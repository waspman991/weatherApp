<?php
// app/Contracts/WeatherInterface.php

namespace App\Interfaces;

interface WeatherInterface
{
    public function getWeather($lat, $lon);
}
