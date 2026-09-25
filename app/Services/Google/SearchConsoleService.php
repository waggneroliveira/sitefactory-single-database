<?php

namespace App\Services\Google;

use App\Models\GoogleCredential;
use Google\Client;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class SearchConsoleService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();

        $this->client->setClientId(
            config('services.google_search_console.client_id')
        );

        $this->client->setClientSecret(
            config('services.google_search_console.client_secret')
        );

        $this->client->setRedirectUri(
            config('services.google_search_console.redirect')
        );

        $this->client->setAccessType('offline');

        $this->client->setPrompt('consent');

        $this->client->setScopes([
            'https://www.googleapis.com/auth/webmasters.readonly',
        ]);
    }

    public function getAuthorizationUrl(): string
    {
        return $this->client->createAuthUrl();
    }

    public function authenticate(string $code): GoogleCredential
    {
        $token = $this->client->fetchAccessTokenWithAuthCode($code);

        if (isset($token['error'])) {
            throw new RuntimeException(
                $token['error_description']
                ?? 'Erro ao autenticar com o Google.'
            );
        }

        return GoogleCredential::updateOrCreate(
            [
                'provider' => 'search_console',
            ],
            [
                'access_token' => $token['access_token'],
                'refresh_token' => $token['refresh_token'] ?? null,
                'expires_at' => now()->addSeconds(
                    $token['expires_in'] ?? 3600
                ),
            ]
        );
    }

    protected function getAccessToken(): string
    {
        $credential = GoogleCredential::where(
            'provider',
            'search_console'
        )->first();

        if (!$credential) {
            throw new RuntimeException(
                'Google Search Console ainda não foi conectado.'
            );
        }

        $this->client->setAccessToken([
            'access_token' => $credential->access_token,
            'refresh_token' => $credential->refresh_token,
            'expires_in' => $credential->expires_at
                ? max(
                    0,
                    now()->diffInSeconds(
                        $credential->expires_at,
                        false
                    )
                )
                : 0,
        ]);

        if ($this->client->isAccessTokenExpired()) {
            if (!$credential->refresh_token) {
                throw new RuntimeException(
                    'O token do Google expirou e não possui refresh token.'
                );
            }

            $token = $this->client->fetchAccessTokenWithRefreshToken(
                $credential->refresh_token
            );

            if (isset($token['error'])) {
                throw new RuntimeException(
                    $token['error_description']
                    ?? 'Não foi possível renovar o token do Google.'
                );
            }

            $credential->update([
                'access_token' => $token['access_token'],
                'expires_at' => now()->addSeconds(
                    $token['expires_in'] ?? 3600
                ),
            ]);
        }

        return $this->client->getAccessToken()['access_token'];
    }

    public function getProperties(): array
    {
        $response = Http::withToken(
            $this->getAccessToken()
        )->get(
            'https://www.googleapis.com/webmasters/v3/sites'
        );

        if ($response->failed()) {
            throw new RuntimeException(
                'Erro ao consultar propriedades do Search Console: '
                . $response->body()
            );
        }

        return $response->json('siteEntry', []);
    }

    public function getPerformance(
        string $property,
        int $days = 28
    ): array {
        $endDate = now()
            ->subDay()
            ->toDateString();

        $startDate = now()
            ->subDays($days)
            ->toDateString();

        $response = Http::withToken(
            $this->getAccessToken()
        )->post(
            'https://www.googleapis.com/webmasters/v3/sites/'
            . rawurlencode($property)
            . '/searchAnalytics/query',
            [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'dimensions' => [
                    'date',
                ],
                'type' => 'web',
                'rowLimit' => 25000,
            ]
        );

        if ($response->failed()) {
            throw new RuntimeException(
                'Erro ao consultar desempenho do Search Console: '
                . $response->body()
            );
        }

        return $response->json('rows', []);
    }
}