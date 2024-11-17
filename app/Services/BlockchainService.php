<?php

namespace App\Services;

use Illuminate\Support\Facades\Http; // Usamos Http para hacer peticiones HTTP

class BlockchainService
{
    /**
     * Obtener el precio de una criptomoneda en una moneda específica.
     *
     * @param string $currency
     * @return mixed
     */
    public function getCryptoPrice($currency = 'USD')
    {
        // URL de la API de blockchain.info
        $url = "https://blockchain.info/ticker";
        
        // Realizamos la solicitud a la API
        $response = Http::get($url);

        if ($response->successful()) {
            // Obtenemos el precio en la moneda solicitada
            $data = $response->json();
            return $data[$currency]['last'] ?? null; // Devuelve el precio o null si no existe
        }

        // Si la solicitud no es exitosa, devolvemos null
        return null;
    }
}