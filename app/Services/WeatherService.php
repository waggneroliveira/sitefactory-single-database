<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function current($lat, $lon)
    {
        $response = Http::timeout(5)->get(
            'https://api.open-meteo.com/v1/forecast',
            [
                'latitude' => $lat,
                'longitude' => $lon,
                'current_weather' => true,
                'timezone' => 'America/Sao_Paulo'
            ]
        );

        if (! $response->ok()) {
            return null;
        }

        return $response->json()['current_weather'] ?? null;
    }
}
