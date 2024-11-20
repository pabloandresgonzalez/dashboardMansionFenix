<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductionService
{
    /**
     * Calcular la producción total diaria de un usuario.
     *
     * @return float
     */
    public function getMonthlyUtility()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        $id = $user->id;

        // Calcular la utilidad del mes actual
        $totalProduction = DB::table('network_transactions')
            ->where('user', $id)
            ->where('type', 'Daily')
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),  // Primer día del mes actual
                Carbon::now()->endOfMonth(),    // Último día del mes actual
            ])
            ->sum('value'); // Sumar el valor de las transacciones

        return $totalProduction;
    }
}
