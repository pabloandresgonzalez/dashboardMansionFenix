<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\UserBalanceService;
use App\Models\wallet_transactions;
use App\Models\User;
use App\Models\UserMembership;
use App\Models\NetworkTransaction;
use DB;
use Carbon\Carbon;
use DateTime;


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
        // Obtener el usuario actualmente autenticado y su ID
        $user = \Auth::user();
        $id = $user->id;

        // Obtener el valor del parámetro 'buscarpor' del request, que se utilizará para filtrar resultados
        $nombre = $request->get('buscarpor');

        // Consultar las transacciones de la billetera que pertenecen al usuario autenticado
        // y que coinciden con el valor de búsqueda en varios campos
        $Wallets = wallet_transactions::where('user', $id)  // Aseguramos que solo sean del usuario autenticado
            ->where(function ($query) use ($nombre) {
                $query->where('user', 'LIKE', "%$nombre%")
                      ->orWhere('id', 'LIKE', "%$nombre%")
                      ->orWhere('currency', 'LIKE', "%$nombre%")
                      ->orWhere('type', 'LIKE', "%$nombre%")
                      ->orWhere('status', 'LIKE', "%$nombre%")
                      ->orWhere('created_at', 'LIKE', "%$nombre%");
            })
            ->orderBy('created_at', 'desc')  // Ordenar las transacciones por fecha de creación en orden descendente
            ->paginate(20);  // Paginar los resultados, mostrando 20 por página

        // Llamar al servicio para obtener el balance del usuario autenticado usando su ID
        $balanceString = $this->userBalanceService->getBalanceByUser($id);

        // Total comission del usuario mes en curso
        $totalCommission = $this->totalCommission();

        // Renderizar la vista 'Wallet.indexAdmin' y pasar los datos obtenidos: transacciones y balance
        return view('Wallet.index', [
            'Wallets' => $Wallets,
            'balanceString' => $balanceString,
            'totalCommission' => $totalCommission
        ]);
    }

    public function store(Request $request)
    {
      //
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
        ->paginate(4);
      
      $diaActual = Carbon::now()->locale('es')->translatedFormat('l d \d\e F \d\e\l Y');

      $startOfMonth = Carbon::now()->startOfMonth()->format('d'); // Primer día del mes
      $endOfMonth = Carbon::now()->endOfMonth()->format('d'); // Último día del mes
      $monthAndYear = Carbon::now()->format('F Y'); // Mes en inglés y año

      Carbon::setLocale('es');
      $monthAndYear = Carbon::now()->locale('es')->translatedFormat('F Y');

      $rangoDias = $startOfMonth . ' - ' . $endOfMonth . ' ' . $monthAndYear;

      /*$memberships = UserMembership::where('user', $user->id)
        ->orderBy('created_at', 'desc')
        ->paginate(6);*/
        
      // Membresias de los ultimos 6 meses
      $memberships = UserMembership::where('user', $user->id)
        ->where('created_at', '>=', Carbon::now()->subMonths(6)) // Filtrar por los últimos 6 meses
        ->orderBy('created_at', 'desc')
        ->paginate(6);

      // Hacer una consulta de transacciones por cada ID de membresía.
      $networktransactions = $memberships->load(['networkTransactions' => function ($query) {
          $query->where('type', 'Daily')->orderBy('id', 'desc')->get();
      }]);


      // Agregar el total de transacciones 'Daily' para cada membresía
      foreach ($memberships as $membership) {
          $membership->total_value = NetworkTransaction::where('userMembership', $membership->id)
              ->where('type', 'Daily')
              ->sum('value');
      }

      return view('Wallet.miWallet', [
        'balanceString' => $balanceString,
        'totalCommission' => $totalCommission,
        'myWallets' => $myWallets,
        'diaActual' => $diaActual,
        'rangoDias' => $rangoDias,
        'memberships' => $memberships,
        'networktransactions' => $networktransactions,


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
        // Obtener usuario autenticado
        $user = \Auth::user();
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;

        // Definir las reglas de validación
        $rules = [
            'value' => 'required|string|max:255', 
            'detail' => 'required|string', 
            'currency' => 'required|string', 
            'wallet' => 'required|string',         
        ];

        // Aplica la validación en el request con las reglas establecidas
        $this->validate($request, $rules);

        // Verificar si el usuario tiene alguna membresía activa
        $hasActiveMembership = UserMembership::where('user', $id)
            ->where('status', 'Activo')
            ->exists();
            //->count();            
        
        // Si el usuario tiene al menos una membresía activa
        if ($hasActiveMembership) {
            // Inicializar la transacción de wallet
            $Wallet = new wallet_transactions();
            $Wallet->user = $id;
            $Wallet->email = $email;

            // Obtener la fecha actual y calcular diferencia de días
            $dia1 = date('Y-m-01');
            $fecha_actual = date("Y-m-d");

            $fecha1 = new DateTime($dia1);
            $fecha2 = new DateTime($fecha_actual);
            $diff = $fecha1->diff($fecha2);

            // Porcentaje de descuento, se puede calcular según otros parámetros
            $percentagedp = 8; // 8% de comisión por defecto
            
            $currencyretiro = $request->input('currency');     
            $valretiro = $request->input('value'); 

            // Llamar al servicio externo para obtener el balance del usuario autenticado
            $balanceString = $this->userBalanceService->getBalanceByUser($id);
            $totalUSDT = $balanceString['USDT']['total'] ?? 0;
            $totalPSIV = $balanceString['PSIV']['total'] ?? 0;
            $total = $totalUSDT + $totalPSIV;
            
            // Inicialización de valores dependiendo de la moneda
            $valretiroPSIV = 0;
            $valretiroUSDT = 0;


            if ($currencyretiro == 'PSIV') {
                $valretiroPSIV = $valretiro;
                $valretiroUSDT = $totalUSDT; // Asegúrate de tener esta variable correctamente inicializada
            } elseif ($currencyretiro == 'USDT') {
                $valretiroUSDT = $valretiro;
                $valretiroPSIV = $totalPSIV; // Asegúrate de tener esta variable correctamente inicializada
            }
            

              // Comprobamos si el valor de retiro es mayor al saldo disponible
              if ($valretiroPSIV > $totalPSIV || $valretiroUSDT > $totalUSDT) {
                  return redirect()->route('miwallet')->with('alert', '¡El valor del traslado no puede ser mayor al saldo disponible!');

              }

            // Calcular las tarifas de retiro
            $toPorretirodp = ($percentagedp * $valretiro) / 100;

            // Asignar valores al objeto Wallet
            $Wallet->fee = $toPorretirodp;
            $Wallet->value = $valretiro - $toPorretirodp;
            $Wallet->type = "Traslado";
            $Wallet->hash = ''; // Aquí puedes generar un hash si es necesario
            $Wallet->currency = $currencyretiro;
            $Wallet->approvedBy = ''; // Si se requiere una aprobación
            $Wallet->wallet = $request->input('wallet');
            $Wallet->inOut = 0; // Ajustar según la lógica de tu aplicación
            $Wallet->status = 'exchange'; // Estado de la transacción
            $Wallet->detail = $request->input('detail'); // Detalle del retiro

            try {
                // Guardar la transacción en la base de datos
                $Wallet->save();

                // Aquí podrías enviar el correo si fuera necesario
                // Mail::to($user->email)->send(new TransactionSentMessage($Wallet));

                return redirect()->route('miwallet')->with('success', '¡Solicitud de traslado enviada correctamente!');
            } catch (\Exception $e) {
                // En caso de error al guardar, loguear el error y notificar al usuario
                \Log::error("Error al guardar la transacción: " . $e->getMessage());
                return redirect()->route('miwallet')->with('error', 'Hubo un problema al procesar la solicitud.');
            }
        }

        // Si no tiene membresías activas, redirigir con un mensaje
        return redirect()->route('miwallet')->with('error', 'No tienes membresías activas.');
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
