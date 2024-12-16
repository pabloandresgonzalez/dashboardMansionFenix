<?php

namespace App\Http\Controllers;

use App\Models\GuiaController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NetworkTransaction;
use App\Services\UserService;
use App\Services\UserBalanceService;
use App\Services\BlockchainService;
use App\Services\CommissionService;
use App\Services\ProductionService;
use DB;


class GuiaControllerController extends Controller
{
    public function __construct(
        UserService $userService,
        BlockchainService $blockchainService,
        CommissionService $commissionService,
        ProductionService $productionService,
        UserBalanceService $userBalanceService,
    )

    {
        $this->userService = $userService;

        $this->blockchainService = $blockchainService;

        $this->commissionService = $commissionService;

        $this->productionService = $productionService;

        $this->userBalanceService = $userBalanceService;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currency = 'USD';

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();

        // Total de usuarios
        $totalUsuarios = \App\Models\User::count();

        // Usuarios activos (isActive = 1)
        $usuariosActivos = \App\Models\User::where('isActive', 1)->count();

        // Calcular el porcentaje
        $porcentajeActivos = $totalUsuarios > 0 
            ? round(($usuariosActivos / $totalUsuarios) * 100, 2) 
            : 0;

        $totalPagos = NetworkTransaction::sum('value');
        $totalPagosReducido = $this->formatNumber($totalPagos);

        // Obtener el total de las transacciones por mes
        $transaccionesPorMes = DB::table('network_transactions')
            ->select(DB::raw('MONTH(created_at) as mes'), DB::raw('SUM(value) as total_value'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('mes', 'asc') // Ordenar por mes
            ->get();

        // Convertir los resultados en un formato adecuado para el gráfico
        $meses = $transaccionesPorMes->pluck('mes'); // Los meses
        $valores = $transaccionesPorMes->pluck('total_value'); // Los valores totales de las transacciones

        $activations = DB::table('user_memberships')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->where('status', 'active')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();


        return view('guias.index', compact(
            'total',
            'price',
            'currency',
            'totalCommission',
            'totalProduction',
            'porcentajeActivos',
            'totalUsuarios',
            'usuariosActivos',
            'totalPagosReducido',
            'meses',
            'valores'
            ));

       


        //return view('guias.index', compact('user'));
    }

    // Función privada dentro del controlador
    private function formatNumber($number)
    {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 2) . 'B';
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 2) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 2) . 'k';
        } else {
            return number_format($number, 2);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GuiaController $guiaController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuiaController $guiaController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuiaController $guiaController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuiaController $guiaController)
    {
        //
    }
}
