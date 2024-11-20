<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use App\Services\BlockchainService;
use App\Services\CommissionService;
use App\Services\ProductionService;


class HomeController extends Controller
{
    // Inyectar el servicio a través del constructor
    public function __construct(
        UserService $userService,
        BlockchainService $blockchainService,
        CommissionService $commissionService,
        ProductionService $productionService
    )

    {
        $this->userService = $userService;

        $this->blockchainService = $blockchainService;

        $this->commissionService = $commissionService;

        $this->productionService = $productionService;

        $this->middleware('auth');
    }

    public function dashboard($currency = 'USD')
    {
        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();

        // Mostrar la vista con las variables $total y $price
        return view('dashboard', compact('total', 'price', 'currency', 'totalCommission', 'totalProduction'));
    }
}
