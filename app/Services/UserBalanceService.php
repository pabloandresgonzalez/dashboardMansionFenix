<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UserBalanceService
{
    public function getBalanceByUser($userId)
    {
        $data = [
            'userId' => $userId,
            'token' => config('services.user_balance.token'), // Asegúrate de tener el token en .env
        ];

        $response = Http::post(config('services.user_balance.url'), $data);

        if ($response->successful()) {
            return $response->json();
        }

        return null; // O maneja el error según sea necesario
    }
}