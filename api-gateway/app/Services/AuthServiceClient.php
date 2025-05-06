<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AuthServiceClient
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.auth_service.url');
    }

    public function getAuthenticatedUser(string $token): ?array
    {
        $response = Http::withToken($token)
            ->acceptJson()
            ->get($this->baseUrl . '/api/me');

        if ($response->ok()) {
            return $response->json();
        }

        return null;
    }
}
