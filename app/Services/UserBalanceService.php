<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UserBalanceService
{
    public function getBalanceByUser($userId)
    {
        $adminToken = auth()->user()->token ?? config('services.user_balance.token'); 

        $data = [
            'userId' => (string) $userId, // Pasar el ID correcto del usuario a consultar
            'token' => $adminToken, 
            'is_admin' => true, // Si la API lo soporta, indicar que es una consulta de admin
        ];

        \Log::info('Consulta a getBalanceByUser', $data); // Log para depurar

        $response = Http::post(config('services.user_balance.url'), $data);

        if ($response->successful()) {
            return $response->json();
        }

        \Log::error('Error en getBalanceByUser', ['response' => $response->body()]);
        return null;
    }

}