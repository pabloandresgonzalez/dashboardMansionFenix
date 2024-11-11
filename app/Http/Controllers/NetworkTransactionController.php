<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMembership;
use App\Services\UserService;
use App\Models\NetworkTransaction;
use DB;


class NetworkTransactionController extends Controller
{
    // Inyectar el servicio a través del constructor
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //Conseguir usuario identificado
        $user = \Auth::user();

        $id = $request->id;
        $networktransactions = NetworkTransaction::where('userMembership', $id)
                                ->where('type', 'Daily')
                                ->orderBy('id', 'desc')->paginate(100);

        $totalProdMember = NetworkTransaction::where('userMembership', $id)
                                ->where('type', 'Daily')
                                ->sum('value');

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $total = $data['total'];

        return view('networktransaction.index', compact('networktransactions', 'totalProdMember', 'total'));        

    }

    public function indexactivacion(Request $request)
    {        
        //dd($request);
        //Conseguir usuario identificado
        $user = \Auth::user();
        $iduser = $user->id;


        $networktransactions = DB::select('SELECT u.*, nt.*   
        FROM network_transactions as nt
        INNER JOIN user_memberships as um ON nt.userMembership = um.id
        INNER JOIN users as u ON um.user = u.id
        WHERE nt.type="Activation" AND
        nt.user = ?', [$iduser]);

        // Total, de comisión por activación de membresías de usuarios referidos 
          $totalComiMember = DB::table("network_transactions")
          ->where('user', $iduser)
          ->where('type', 'Activation')      
          ->sum("value");


        return view('networktransaction.indexactivacion', compact('networktransactions', 'totalComiMember'));        

    }

    private function totalCommission()
    {
      // Conseguir usuario identificado
      $user = \Auth::user();
      $id = $user->id;

      // Total, de comisión por activación de membresías de usuarios referidos 
      $totalCommission = DB::table("network_transactions")
      ->where('user', $id)
      ->where('type', 'Activation')      
      ->get()->sum("value");

      /*$totalCommission1 = DB::select("SELECT * FROM network_transactions 
        WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) 
        AND MONTH(created_at)  = MONTH(CURRENT_DATE())
        AND type = 'Activation'
        AND status = 'Activa'
        AND user = ?", [$id]);*/

      //$valores = array_column($totalCommission1, 'value');
      //$totalCommission = array_sum($valores);

      return $totalCommission;
    }

    private function totalProduction()
    {
      // Conseguir usuario identificado
      $user = \Auth::user();
      $id = $user->id;

      // Total usuarios
      $totalProduction = DB::table("network_transactions")
      ->where('user', $id)
      ->where('type', 'Daily')
      ->get()->sum("value");

      return $totalProduction;
    }

    private function totalProductionMes()
    {
      // Conseguir usuario identificado
      $user = \Auth::user();
      $id = $user->id;

      $totalProductionMes1 = DB::select("SELECT * FROM network_transactions 
        WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) 
        AND MONTH(created_at)  = MONTH(CURRENT_DATE())
        AND type = 'Daily'
        AND status = 'Activa'
        AND user = ?", [$id]);

      $valores = array_column($totalProductionMes1, 'value');
      $totalProductionMes = array_sum($valores);

      return $totalProductionMes;
    }


}
