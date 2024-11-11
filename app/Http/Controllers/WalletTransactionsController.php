<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\UserBalanceService;
use App\Models\wallet_transactions;
use App\Models\User;
use App\Models\UserMembership;
use DB;
use Carbon\Carbon;


class WalletTransactionsController extends Controller
{
  protected $userBalanceService;

    // Inyectar el servicio a través del constructor
    public function __construct(UserService $userService, UserBalanceService $userBalanceService)
    {
        $this->userService = $userService;

        $this->middleware('auth');

        $this->userBalanceService = $userBalanceService;
    }

    public function indexAdmin(Request $request)
    {
      // Obtener el usuario actualmente autenticado y su ID
      $user = \Auth::user();
      $id = $user->id;

      // Obtener el valor del parámetro 'buscarpor' del request, que se utilizará para filtrar resultados
      $nombre = $request->get('buscarpor');

      // Consultar las transacciones de la billetera que coinciden con el valor de búsqueda en varios campos
      $Wallets = wallet_transactions::where('user', 'LIKE', "%$nombre%")
          ->orWhere('email', 'LIKE', "%$nombre%")
          ->orWhere('currency', 'LIKE', "%$nombre%")
          ->orWhere('type', 'LIKE', "%$nombre%")
          ->orWhere('status', 'LIKE', "%$nombre%")
          ->orWhere('created_at', 'LIKE', "%$nombre%")
          ->orderBy('created_at', 'desc') // Ordenar las transacciones por fecha de creación en orden descendente
          ->paginate(20); // Paginar los resultados, mostrando 20 por página

      // Llamar al servicio para obtener el balance del usuario autenticado usando su ID
      $balanceString = $this->userBalanceService->getBalanceByUser($id);

      // Total comission del usuario mes en curso
      $totalCommission = $this->totalCommission();

      // Renderizar la vista 'Wallet.indexAdmin' y pasar los datos obtenidos: transacciones y balance
      return view('Wallet.indexAdmin', [
          'Wallets' => $Wallets,
          'balanceString' => $balanceString,
          'totalCommission' => $totalCommission 
      ]);
    }

    public function index(Request $request)
    {

      //Conseguir usuario identificado
      $user = \Auth::user();

      $id = $user->id;


      $data = [
      'userId' => $id,
      'token' => 'AcjAa76AHxGRdyTemDb2jcCzRmqpWN'
      ];

      $curl = curl_init();

      curl_setopt_array($curl, array(
          CURLOPT_URL => "https://sd0fxgedtd.execute-api.us-east-2.amazonaws.com/Prod_getBalanceByUser",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30000,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($data),        
          CURLOPT_HTTPHEADER => array(
            // Set here requred headers
              "accept: */*",
              "accept-language: en-US,en;q=0.8",
              "content-type: application/json",
          ),
      ));

      $result = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      //decodificar JSON porque esa es la respuesta
      $respuestaDecodificada = json_decode($result); 
      //dd($respuestaDecodificada); 

      $Wallets = wallet_transactions::where('user', $user->id)->orderBy('id', 'desc')
        ->paginate(50);

        
        return view('wallets.index', [
          'user' => $user,
          'Wallets' => $Wallets,
          'result' => $result,
          'totalusers' => $totalusers,
          'totalCommission' => $totalCommission,
          'totalProduction' => $totalProduction,
          'totalProductionMes' => $totalProductionMes
        ]); 
    }

    public function store(Request $request)
    {
      //Conseguir usuario identificado
      $user = \Auth::user();
      $id = $user->id;
      $name = $user->name;
      $email = $user->email;

      $id = $user->id;


      $data = [
      'userId' => $id,
      'token' => 'AcjAa76AHxGRdyTemDb2jcCzRmqpWN'
      ];

      $curl = curl_init();

      curl_setopt_array($curl, array(
          CURLOPT_URL => "https://sd0fxgedtd.execute-api.us-east-2.amazonaws.com/Prod_getBalanceByUser",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30000,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($data),        
          CURLOPT_HTTPHEADER => array(
            // Set here requred headers
              "accept: */*",
              "accept-language: en-US,en;q=0.8",
              "content-type: application/json",
          ),
      ));

      $result = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      //decodificar JSON porque esa es la respuesta
      $respuestaDecodificada = json_decode($result); 
      
      $url = ($result);
      $data = json_decode($url, true);
      $totalPSIV = $data['PSIV']['total'];
      $totalUSDT = $data['USDT']['total'];
                
      $rules = ([
          
          'value' => 'required|string|max:255',
          'detail' => 'required|string', 
          'currency' => 'required|string', 
          'wallet' => 'required|string',         
          
      ]);

       $this->validate($request, $rules);

       // $idmovimiento = $request->input('idmovimiento');
       
       $idmovimiento = User::where('id', $id)->first();
       $userid = $idmovimiento->id;
       $useremail = $idmovimiento->email;


       $memberships = UserMembership::where('user', $userid)
        ->where('status', 'Activo')->get();

        $cantmemberships = $memberships->count();

        // Si tiene almenos una membresia activa
        if ($cantmemberships > 0) {

        $Wallet = new wallet_transactions();
        $Wallet->user = $id;
        $Wallet->email = $email;


        $dia1 = date('Y-m-01');
        $fecha_actual = date("Y-m-d");

        //$dias_habiles = bussiness_days($dia1, $fecha_actual);

        //dd($dias_habiles);


        $fecha1= new DateTime($dia1);
        $fecha2= new DateTime($fecha_actual);
        $diff = $fecha1->diff($fecha2);
       

        //$percentageda = 12;
        $percentagedp = 8;   
        $currencyretiro = $request->input('currency');     
        $valretiro = $request->input('value');
        //$valretiroUSDT = $request->input('value');
        //$valretiroUSDT = $request->input('value');

        if ($currencyretiro == 'PSIV') {
          $valretiroPSIV = $request->input('value');
          $valretiroUSDT = $totalUSDT;
        } elseif ($currencyretiro == 'USDT') {
          $valretiroUSDT = $request->input('value');
          $valretiroPSIV = $totalPSIV;
        } {
          
        }

        if ($valretiroPSIV > $totalPSIV || $valretiroUSDT > $totalUSDT) {

          return redirect()->route('home')->with([
                    'message' => '¡' . $name . ' ' . '¡El valor del traslado no puede ser mayor al saldo disponible!'
                    //'totalusers' => $totalusers
          ]); 

        } else {

          //$toPorretiroda = ($percentageda * $valretiro) / 100;
          $toPorretirodp = ($percentagedp * $valretiro) / 100;

        /*
        if ($diff->days < 15) {
          $Wallet->fee = $toPorretiroda;
          $Wallet->value = $valretiro - $toPorretiroda;
        } else {
          $Wallet->fee = $toPorretirodp;
          $Wallet->value = $valretiro - $toPorretiroda;
        }
        */

        $Wallet->fee = $toPorretirodp;
        $Wallet->value = $valretiro - $toPorretirodp;
        $Wallet->type = "Traslado";
        $Wallet->hash = '';
        $Wallet->currency = $request->input('currency');
        $Wallet->approvedBy = '';
        $Wallet->wallet = $request->input('wallet');
        $Wallet->inOut = 0;
        $Wallet->status = 'exhange';     
        $Wallet->detail = $request->input('detail');


        $Wallet->save();// INSERT BD


        //enviar email
        $user_email = User::where('role', 'admin')->first();
        $user_email_admin = $user_email->email;
        $user_email_admin2 = 'soportefuturslatinoamerica@gmail.com';

        Mail::to($email)->send(new TransactionSentMessage($Wallet));

        Mail::to($user_email_admin)->send(new TransactionMessageCreated($Wallet));
        Mail::to($user_email_admin2)->send(new TransactionMessageCreated($Wallet));

        // Total comission del usuario mes en curso
        $totalCommission = $this->totalCommission();

        // Hitorial de produccion 
        $totalProduction = $this->totalProduction();

        // Total produccion del usuario mes en curso
        $totalProductionMes = $this->totalProductionMes();

        // Total usuarios
        $totalusers = $totalusers = $this->countUsers();

        return redirect()->route('home')->with([
                    'message' => '¡' . $name .' ' . '¡solicitud de traslado enviada correctamente!',
                    'totalusers' => $totalusers,
                    'totalCommission' => $totalCommission,
                    'totalProduction' => $totalProduction,
                    'totalProductionMes' => $totalProductionMes
        ]);

        }
                  
      }

        return redirect()->route('home')->with([
                    'message' => '¡' . $name . ' ' . '¡es necesario tener mínimo una membresía activa para poder hacer traslados!'
                    //'totalusers' => $totalusers
        ]);   

    }

    public function update(Request $request, $id)
    {
      //dd($request);   

      //Conseguir usuario identificado
      $user = \Auth::user();
      $iduser = $user->id;


      $Wallet = wallet_transactions::find($id);
      $user = $Wallet->user;
      $email = $Wallet->email;
      $value = $Wallet->value;
      $detail = $Wallet->detail;
      $type = $Wallet->type;
      $currency = $Wallet->currency;
      $wallet = $Wallet->wallet;
      $fee = $Wallet->fee;
      $inOut = $Wallet->inOut;     
                
      $rules = ([

          //'value' => 'required|string|max:255',
          //'detail' => 'required|string', 
          'hash' => 'required|max:255|unique:wallet_transactions',
          'status' => 'required|string|max:255',  

      ]);

       $this->validate($request, $rules);

        $Wallet = wallet_transactions::findOrFail($id);
        $Wallet->user = $user;
        $Wallet->email = $email;
        $Wallet->value = $value;
        $Wallet->fee = $fee;
        $Wallet->type = $type;
        $Wallet->hash = $request->input('hash');
        $Wallet->currency = $currency;
        $Wallet->approvedBy = $iduser;
        $Wallet->$wallet;
        $Wallet->inOut = $inOut;
        $Wallet->status = $request->input('status');
        $Wallet->detail = $request->input('hash');
      

        $Wallet->save();// INSERT BD

      /*
              //enviar email
              $user_email = User::where('role', 'admin')->first();
              $user_email_admin = $user_email->email;
              $user_email_admin2 = 'soportefuturslatinoamerica@gmail.com';

              Mail::to($email)->send(new StatusChangeTransactionMessage($Wallet));

              Mail::to($user_email_admin)->send(new StatusChangeTransactionMessageAdmin($Wallet));
              Mail::to($user_email_admin2)->send(new StatusChangeTransactionMessageAdmin($Wallet));        

              // Total comission del usuario mes en curso
              $totalCommission = $this->totalCommission();

              // Hitorial de produccion 
              $totalProduction = $this->totalProduction();

              // Total produccion del usuario mes en curso
              $totalProductionMes = $this->totalProductionMes();

              // Total usuarios
              $totalusers = $totalusers = $this->countUsers();
      */
      return redirect()->route('walletadmin')->with('success', 'Traslado No'. $Wallet->id .'aprobado correctamente.');
    }

    public function miWallet(Request $request)
    {
      // Obtener el usuario actualmente autenticado y su ID
      $user = \Auth::user();
      $id = $user->id;

      // Llamar al servicio para obtener el balance del usuario autenticado usando su ID
      $balanceString = $this->userBalanceService->getBalanceByUser($id);

      // Total comission del usuario mes en curso
      $totalCommission = $this->totalCommission();

      $myWallets = wallet_transactions::where('user', $id)->orderBy('created_at', 'desc')
        ->paginate(15);
      
      $diaActual = Carbon::now()->locale('es')->translatedFormat('l d \d\e F \d\e\l Y');

      $startOfMonth = Carbon::now()->startOfMonth()->format('d'); // Primer día del mes
      $endOfMonth = Carbon::now()->endOfMonth()->format('d'); // Último día del mes
      $monthAndYear = Carbon::now()->format('F Y'); // Mes en inglés y año

      Carbon::setLocale('es');
      $monthAndYear = Carbon::now()->locale('es')->translatedFormat('F Y');

      $rangoDias = $startOfMonth . ' - ' . $endOfMonth . ' ' . $monthAndYear;

      return view('Wallet.miWallet', [
        'balanceString' => $balanceString,
        'totalCommission' => $totalCommission,
        'myWallets' => $myWallets,
        'diaActual' => $diaActual,
        'rangoDias' => $rangoDias

      ]);

    }

    public function asigSaldo(Request $request)
    {
      $users = User::where('isActive', 1)
               ->orderBy('name')
               ->get();

      // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $totalUsers = $data['total'];

      return view('Wallet.asigsaldo', [
        'users' => $users,
        'totalUsers' => $totalUsers
        ]);
    }

    public function storeadmin(Request $request)
    {
        // Obtiene el usuario actualmente autenticado
        $user = \Auth::user();
        $id = $user->id;           // ID del usuario
        $name = $user->name;       // Nombre del usuario
        $email = $user->email;     // Email del usuario

        // Define las reglas de validación para los datos del formulario
        $rules = [
            'iduser' => 'required|string|max:255',     // ID del usuario asignado (obligatorio)
            'value' => 'required|string|max:255',      // Valor del traslado (obligatorio)
            'type' => 'required|string|max:255',       // Tipo de movimiento (obligatorio)
            'detail' => 'required|string',             // Detalle del movimiento (obligatorio)
        ];

        // Aplica la validación en el request con las reglas establecidas
        $this->validate($request, $rules);

        // Obtiene el ID de usuario especificado en el formulario
        $iduser = $request->input('iduser');

        // Busca el usuario con el ID especificado
        $iduser = User::where('id', $iduser)->first();
        $userid = $iduser->id;      // ID del usuario encontrado
        $useremail = $iduser->email; // Email del usuario encontrado

        // Obtiene las membresías activas del usuario autenticado
        $memberships = UserMembership::where('user', $id)
            ->where('status', 'Activo')->get();

        // Cuenta el número de membresías activas
        $cantmemberships = $memberships->count();

        // Crea una nueva instancia de la transacción de billetera
        $Wallet = new wallet_transactions();
        $Wallet->user = $userid;                            // Asigna el ID del usuario
        $Wallet->email = $useremail;                        // Asigna el email del usuario
        $Wallet->value = $request->input('value');          // Asigna el valor del traslado
        $Wallet->fee = 0;                                   // Asigna la tarifa (0 en este caso)
        $type = $request->input('type');                    // Obtiene el tipo de movimiento
        $Wallet->type = $type;                              // Asigna el tipo de movimiento
        $Wallet->hash = 'Autoriza ' . $name . "-" . $email; // Autoriza el movimiento con el nombre y email del autenticado
        $Wallet->currency = $request->input('currency');    // Asigna la moneda
        $Wallet->approvedBy = $id;                          // ID de quien aprueba el movimiento (usuario autenticado)
        $Wallet->wallet = null;                             // Deja el campo `wallet` como null por defecto

        // Determina el valor de `inOut` según el tipo de movimiento (0 para Traslado, 1 para Abono)
        if ($type === "Traslado") {
            $Wallet->inOut = 0;
        } else {
            $Wallet->inOut = 1;
        }

        // Define el estado de la transacción como 'Aprobada'
        $Wallet->status = 'Aprobada';
        $Wallet->detail = $request->input('detail');        // Asigna el detalle del movimiento

        // Guarda la transacción en la base de datos
        $Wallet->save();

        // Redirige a la ruta 'walletadmin' con un mensaje de éxito
        return redirect()->route('walletadmin')->with('success', 'Asignación de saldo enviada correctamente!');
    }

    public function storeUser(Request $request)
    {
      //Conseguir usuario identificado
      $user = \Auth::user();
      $id = $user->id;
      $name = $user->name;
      $email = $user->email;

      
      $rules = ([
          
          'value' => 'required|string|max:255',
          'detail' => 'required|string', 
          'currency' => 'required|string', 
          'wallet' => 'required|string',         
          
      ]);

       $this->validate($request, $rules);

        // Busca el usuario con el ID especificado
        $iduser = User::where('id', $id)->first();
        $userid = $iduser->id;      // ID del usuario encontrado
        $useremail = $iduser->email; // Email del usuario encontrado


       $memberships = UserMembership::where('user', $userid)
        ->where('status', 'Activo')->get();

        $cantmemberships = $memberships->count();

        // Si tiene almenos una membresia activa
        if ($cantmemberships > 0) {

        $Wallet = new wallet_transactions();
        $Wallet->user = $id;
        $Wallet->email = $email;


        $dia1 = date('Y-m-01');
        $fecha_actual = date("Y-m-d");

        $fecha1= new DateTime($dia1);
        $fecha2= new DateTime($fecha_actual);
        $diff = $fecha1->diff($fecha2);       

        //$percentageda = 12;
        $percentagedp = 8;   
        $currencyretiro = $request->input('currency');     
        $valretiro = $request->input('value');
        //$valretiroUSDT = $request->input('value');
        //$valretiroUSDT = $request->input('value');

        if ($currencyretiro == 'PSIV') {
          $valretiroPSIV = $request->input('value');
          $valretiroUSDT = $totalUSDT;
        } elseif ($currencyretiro == 'USDT') {
          $valretiroUSDT = $request->input('value');
          $valretiroPSIV = $totalPSIV;
        } {
          
        }

        if ($valretiroPSIV > $totalPSIV || $valretiroUSDT > $totalUSDT) {

          return redirect()->route('miwallet')->with([
                    'message' => '¡' . $name . ' ' . '¡El valor del traslado no puede ser mayor al saldo disponible!'
                    //'totalusers' => $totalusers
          ]); 

        } else {

          //$toPorretiroda = ($percentageda * $valretiro) / 100;
          $toPorretirodp = ($percentagedp * $valretiro) / 100;

        /*
        if ($diff->days < 15) {
          $Wallet->fee = $toPorretiroda;
          $Wallet->value = $valretiro - $toPorretiroda;
        } else {
          $Wallet->fee = $toPorretirodp;
          $Wallet->value = $valretiro - $toPorretiroda;
        }
        */

        $Wallet->fee = $toPorretirodp;
        $Wallet->value = $valretiro - $toPorretirodp;
        $Wallet->type = "Traslado";
        $Wallet->hash = '';
        $Wallet->currency = $request->input('currency');
        $Wallet->approvedBy = '';
        $Wallet->wallet = $request->input('wallet');
        $Wallet->inOut = 0;
        $Wallet->status = 'exhange';     
        $Wallet->detail = $request->input('detail');


        $Wallet->save();// INSERT BD

        /*
        //enviar email
        $user_email = User::where('role', 'admin')->first();
        $user_email_admin = $user_email->email;
        $user_email_admin2 = 'soportefuturslatinoamerica@gmail.com';

        Mail::to($email)->send(new TransactionSentMessage($Wallet));

        Mail::to($user_email_admin)->send(new TransactionMessageCreated($Wallet));
        Mail::to($user_email_admin2)->send(new TransactionMessageCreated($Wallet));
        */

        

        return redirect()->route('miwallet')->with([
                    'message' => '¡' . $name .' ' . '¡solicitud de traslado enviada correctamente!',
                    
        ]);

        }
                  
      }

        return redirect()->route('miwallet')->with([
                    'message' => '¡' . $name . ' ' . '¡es necesario tener mínimo una membresía activa para poder hacer traslados!'
                    //'totalusers' => $totalusers
        ]);      

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

}
