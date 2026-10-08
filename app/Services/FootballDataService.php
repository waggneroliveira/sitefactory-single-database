<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FootballDataService
{
    public function getBrasileiraoStandings(): array
    {
        $apiKey = '4754b23a33e54b2a9403bf1f87df7ca4';

        $standings = Cache::remember('tabela_brasileirao', 900, function () use ($apiKey) {

            $response = Http::withoutVerifying()
                ->withHeaders([
                    'X-Auth-Token' => $apiKey,
                ])
                ->get('https://api.football-data.org/v4/competitions/BSA/standings');

            if ($response->successful()) {
                $data = $response->json();

                return $data['standings'][0]['table'] ?? [];
            }

            Log::error('Erro ao buscar tabela do Brasileirão', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            return [];
        });

        if (empty($standings)) {
            Cache::forget('tabela_brasileirao');
        }

        return $standings;
    }
}