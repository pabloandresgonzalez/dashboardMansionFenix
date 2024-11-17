<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use App\Services\BlockchainService;

class HomeController extends Controller
{
    // Inyectar el servicio a través del constructor
    public function __construct(UserService $userService, BlockchainService $blockchainService)
    {
        $this->userService = $userService;

        $this->blockchainService = $blockchainService;

        $this->middleware('auth');
    }

    public function dashboard($currency = 'USD')
    {
        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        // Mostrar la vista con las variables $total y $price
        return view('dashboard', compact('total', 'price', 'currency'));
    }
}
