<?php

namespace App\Http\Controllers;

use App\Models\UserMembership;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\UserBalanceService;
use App\Services\BlockchainService;
use App\Services\CommissionService;
use App\Services\ProductionService;
use App\Models\membresia;
use Illuminate\Support\Facades\File;
use App\Mail\MembershipCreatedMessage;
use App\Mail\StatusChangeMembershipseMessage;
use App\Mail\StatusChangeMembershipseMessageAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\wallet_transactions;
use Illuminate\Support\Facades\Crypt;

class UserMembershipController extends Controller
{
    public function __construct(
        UserService $userService,
        UserBalanceService $userBalanceService,
        BlockchainService $blockchainService,
        CommissionService $commissionService,
        ProductionService $productionService
    )

    {       

        $this->userService = $userService;

        $this->userBalanceService = $userBalanceService;

        $this->blockchainService = $blockchainService;

        $this->commissionService = $commissionService;

        $this->productionService = $productionService;

        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $currency = 'USD';

        $nombre = $request->get('buscarpor'); 

        // Buscador
        $memberships = UserMembership::where('id', 'LIKE', "%$nombre%")
        ->orwhere('membership', 'LIKE', "%$nombre%")
        ->orwhere('user_email', 'LIKE', "%$nombre%")
        ->orwhere('user_name', 'LIKE', "%$nombre%")
        ->orwhere('status', 'LIKE', "%$nombre%")
        ->orwhere('detail', 'LIKE', "%$nombre%")
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        //$memberships = UserMembership::orderBy('updated_at', 'Desc')->paginate(8);
        //$data = ['memberships' => $memberships];

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();

        $fecha_actual = date("Y-m-d H:i:s");

        // Retornar la vista con un array asociativo
        return view('Memberships.index', [
            'memberships' => $memberships,
            'total' => $total,
            'price' => $price,
            'currency' => $currency,
            'totalCommission' => $totalCommission,
            'totalProduction' => $totalProduction,
            'inactivarInput' => true,
            'fecha_actual' => $fecha_actual
        ]);
    }

    public function store(Request $request)
    {
        //Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;
        
        // reglas de validacion  
        $rules = ([
            
            'id_membresia' => 'required|string',  //|unique:user_memberships|min:4 
            'name' => 'required|string',
            'hashUSDT' => 'required|max:255|unique:user_memberships', //|unique:user_memberships
            //'hashPSIV' => 'max:255|unique:user_memberships', //|unique:user_memberships
            'image' => 'file',             
            
        ]);

       $this->validate($request, $rules);

       $namemembresia = $request->input('name');

       $membershipsuser = UserMembership::where('user', $user->id)
        ->where('membership', $namemembresia)
        ->whereIn('status', ['Activo', 'Pendiente'])
        ->get()
        ->toArray();

        if ($membershipsuser) {

            return redirect()->route('mismemberships.index')->with('alert', '¡' . $name . ' ' .'¡Ya cuentas con un fondo de este valor pendiente o activo!');      
        }

        // Llamar al servicio externo para obtener el balance del usuario autenticado
        $balanceString = $this->userBalanceService->getBalanceByUser($id);
        $totalUSDT = $balanceString['USDT']['total'] ?? 0;
        $totalPSIV = $balanceString['PSIV']['total'] ?? 0;
        $total = $totalUSDT + $totalPSIV;

        $membresia = Membresia::find($request->input('id_membresia'));
        $valormembresia = $membresia->valor;

        if ($totalPSIV < $valormembresia) {

            return redirect()->route('mismemberships.index')->with('alert', ' ' . $name . ' ¡' .'Ups, El saldo es insuficiente para comprar el fondo¡');    
        }


        if ($membresia->name !== $request->input('name')) {
            return redirect()->route('mismemberships.index')->with('alert', 'ID del fondo o Fondo manipulados en el formulario.');
        }

        $tokenData = json_decode(Crypt::decryptString($request->input('form_token')), true);

        // Validar los datos desencriptados
        $membresia = Membresia::findOrFail($tokenData['id_membresia']);

        if ($membresia->name !== $tokenData['name']) {
            return redirect()->route('mismemberships.index')->with('alert', 'Datos manipulados en el formulario.');
        }


        $fecha_actual = date("Y-m-d H:i:s");

        $membership = new UserMembership();
        $membership->id_membresia = $request->input('id_membresia');
        $membership->membership = $request->input('name');
        $membership->user_email = $email;
        $membership->user = $id;
        $membership->user_name = $name;
        $membership->hashUSDT = $request->input('hashUSDT');
        //$membership->hashPSIV = $request->input('hashPSIV'); 
        $membership->detail = 'Pendiente';
        $membership->status = 'Pendiente';
        $membership->closedAt = null;
        $membership->activedAt = null;

        //Subir la imagen imagehash
        $image_photo = $request->file('image');
        if ($image_photo) {

          //Poner nombre unico
          $image_photo_name = time() . $image_photo->getClientOriginalName();

          //Guardarla en la carpeta storage (storage/app/imagehash)
          Storage::disk('imagehash')->put($image_photo_name, File::get($image_photo));

          //Seteo el nombre de la imagen en el objeto
          $membership->image = $image_photo_name;
        }

        $membership->save();// INSERT BD

        //Enviar email
        $user_email_admin = User::where('role', 'admin')->first();
        
        Mail::to($email)->send(new MembershipCreatedMessage($membership));
        Mail::to($user_email_admin)->send(new MembershipCreatedMessage($membership));

        return redirect()->route('mismemberships.index')->with('success', 'Fondo comprado con éxito!');        

    }

    public function update(Request $request, UserMembership $userMembership)
    {

        //Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;

        // Validación del formulario
        $validatedData = $request->validate([
            'activedAt' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|string|max:255',
        ]);

        try {
            // Inicia la transacción
            DB::beginTransaction();

            // Formatear la fecha 'activedAt'
            $fechaFormateada = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['activedAt'])
                ->format('Y-m-d H:i:s');

            // Actualizar el modelo usando asignación masiva
            $userMembership->fill([
                'activedAt' => $fechaFormateada,
                'status' => $validatedData['status'],
                'closedAt' => $this->calculateClosedAt(), // Método para calcular la fecha final
                'detail' => $validatedData['status'],
            ]);

            // Guardar el modelo
            $userMembership->save();


            // Confirmar la transacción
            DB::commit();

            //Enviar email
            $user_email_admin = User::where('role', 'admin')->first();
            
            Mail::to($email)->send(new StatusChangeMembershipseMessage($userMembership));
            Mail::to($user_email_admin)->send(new StatusChangeMembershipseMessageAdmin($userMembership));

            // Redirigir con éxito
            return redirect()->route('membership.index')->with('success', 'Fondo actualizado con éxito!');

        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();
            return redirect()->route('membership.index')->withErrors('Hubo un problema al actualizar el fondo: ' . $e->getMessage());
        }
    }    

    public function misMemberships()
    {
        $currency = 'USD';

        //Conseguir usuario identificado
        $user = \Auth::user();
        $username = $user->name;

        $memberships = UserMembership::where('user', $user->id)
        ->orderBy('created_at', 'desc')
        ->paginate(50);

        /// Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();

        $fecha_actual = date("Y-m-d H:i:s");

        // Retornar la vista con un array asociativo
        return view('Memberships.mismemberships', [
            'memberships' => $memberships,
            'total' => $total,
            'price' => $price,
            'currency' => $currency,
            'totalCommission' => $totalCommission,
            'totalProduction' => $totalProduction,
            'inactivarInput' => true,
            'fecha_actual' => $fecha_actual
        ]);
    }

    private function calculateClosedAt()
    {
        $date = Carbon::now();
        $daysAdded = 0;

        while ($daysAdded < 30) {
            $date->addDay();
            if (!$date->isWeekend()) {
                $daysAdded++;
            }
        }

        return $date->format('Y-m-d H:i:s');

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

    public function renovar(Request $request, $id)
    {
        try {
            // Conseguir usuario autenticado y sus datos principales
            $user = \Auth::user();
            $iduser = $user->id;
            $email = $user->email;

            // Obtener la membresía principal (padre) que se va a renovar
            $membershippadre = UserMembership::findOrFail($id);
            $id_membresia = $membershippadre->id_membresia;

            // Definir la variable $namemembresia, que es la que viene del formulario
            $namemembresia = $request->input('membership'); // Asumimos que 'membership' es el campo en el formulario

            // Contar el número de renovaciones de esta membresía
            $renovacionesCount = UserMembership::where('user', $iduser)
                ->where('membership', $namemembresia) // Ahora utilizamos la variable correctamente definida
                ->where('activedAt', '>=', now()->subDays(30)) // Filtra por las últimas renovaciones
                ->count();

            // Verificar si ya se alcanzaron las 20 renovaciones
            if ($renovacionesCount >= 20) {
                return redirect()->route('mismemberships.index')->with('alert', '¡Límite de renovaciones alcanzado! No es posible renovar más de 20 veces.');
            }

            // Obtener detalles de la membresía (tipo y costo)
            $membresia = Membresia::findOrFail($id_membresia);
            $valor_membresia = $membresia->valor;

            // Llamar al servicio externo para obtener el balance del usuario autenticado
            $balanceString = $this->userBalanceService->getBalanceByUser($iduser);
            $totalUSDT = $balanceString['USDT']['total'] ?? 0;
            $totalPSIV = $balanceString['PSIV']['total'] ?? 0;
            $total = $totalUSDT + $totalPSIV;

            // Verificar que el usuario tenga saldo suficiente para la renovación
            if ($valor_membresia > $total) {
                return redirect()->route('mismemberships.index')->with('alert', '¡Ups! Saldo insuficiente para renovar!');
            }

            // Validación de entrada del formulario para el campo 'membership'
            $request->validate([
                'membership' => 'required|string|min:4',
            ]);

            // Crear nueva instancia de membresía renovada
            $membership = new UserMembership();
            $membership->id_membresia = $id_membresia;
            $membership->membresiaPadre = $id; // referencia a la membresía padre
            $membership->membership = $namemembresia; // Usamos la variable correcta
            $membership->user_email = $email;
            $membership->user = $iduser;
            $membership->user_name = $user->name;
            $membership->hashUSDT = 'Descuento de saldo ' . bin2hex(random_bytes(20));
            $membership->detail = 'Activo';
            $membership->status = 'Activo';

            $membership->closedAt = $this->calculateClosedAt(); // Método para calcular la fecha final
            $membership->activedAt = now(); // Fecha de activación actual

            // Procesar y almacenar la imagen proporcionada por el usuario (si existe)
            if ($image_photo = $request->file('image')) {
                $image_photo_name = time() . $image_photo->getClientOriginalName();
                Storage::disk('imagehash')->put($image_photo_name, File::get($image_photo));
                $membership->image = $image_photo_name; // Guardar nombre de la imagen en el objeto
            }

            // Cambiar estado de la membresía inicial a 'Terminada'
            $membershippadre->status = 'Terminada';
            $membershippadre->detail = 'Terminada';

            // Guardar los cambios en la nueva membresía y actualizar la membresía padre
            $membership->save();
            $membershippadre->save();

            // Crear una transacción de descuento en la billetera del usuario
            $percentage = 5; // Porcentaje de descuento
            $Wallet = new wallet_transactions();
            $Wallet->user = $iduser;
            $Wallet->email = $email;
            $Wallet->value = $valor_membresia;
            $Wallet->fee = ($percentage / 100) * $valor_membresia; // Calcular el monto de descuento
            $Wallet->type = "Renovar";
            $Wallet->hash = 'Descuento para renovar ' . bin2hex(random_bytes(20));
            $Wallet->currency = 'PSIV';
            $Wallet->approvedBy = $email;
            $Wallet->wallet = 'Descuento para renovar ' . bin2hex(random_bytes(20));
            $Wallet->inOut = 0; // Salida de fondos (0 indica una salida de dinero)
            $Wallet->status = 'Aprobada';
            $Wallet->detail = 'Descuento para renovar membresía';

            // Guardar la transacción en la base de datos
            $Wallet->save();

            // Redirigir al usuario con un mensaje de éxito
            return redirect()->route('mismemberships.index')->with('success', 'Hash de renovación enviado correctamente!');
        } catch (\Exception $e) {
            // En caso de error, redirigir con un mensaje de alerta
            return redirect()->route('mismemberships.index')->with('alert', 'Error al renovar membresía: ' . $e->getMessage());
        }
    }

    

}

