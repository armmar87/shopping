<?php

namespace App\Domain\User\Services;

use Illuminate\Support\Facades\Http;
class UserDomainService
{
    private string $authServiceUrl;

    public function __construct()
    {
        $this->authServiceUrl = config('services.auth.url');
    }

    public function getUserCalculationType(int $userId): string
    {
        $response = Http::get("{$this->authServiceUrl}/api/users/{$userId}/calculation-type");

        if ($response->successful()) {
            return $response->json()['calculation_type'];
        }

        return 'with_tax'; // default
    }
}
