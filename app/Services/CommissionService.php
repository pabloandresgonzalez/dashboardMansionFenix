<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommissionService
{
    /**
     * Calcular la comisión total por activación de membresías de usuarios referidos.
     *
     * @return float
     */
    public function getTotalCommission(): float
    {
        // Conseguir usuario identificado
        $user = Auth::user();
        $id = $user->id;

        // Total de comisión por activación de membresías
        $totalCommission = DB::table("network_transactions")
            ->where('user', $id)
            ->where('type', 'Activation')
            ->get()
            ->sum("value");

        return $totalCommission;
    }
}