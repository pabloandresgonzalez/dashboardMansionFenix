<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\UserMembership;
use App\Models\wallet_transactions;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Services\UserService;
use App\Services\UserBalanceService;
use App\Services\BlockchainService;
use App\Services\CommissionService;
use App\Services\ProductionService;
use DB;


class UserController extends Controller
{
    protected $userService;

    // Inyectar el servicio a través del constructor
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

    public function index(Request $request)
    {
        //dd($request);
        $nombre = $request->get('buscarpor'); 

        // Buscador
        $users = User::where('name', 'LIKE', "%$nombre%")
        ->orwhere('lastname', 'LIKE', "%$nombre%")
        ->orwhere('role', 'LIKE', "%$nombre%")
        ->orwhere('email', 'LIKE', "%$nombre%")
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $total = $data['total'];

        // Retornar la vista con un array asociativo
        return view('Users/user-management', [
            'users' => $users,
            'total' => $total
        ]);

    }

    public function store(Request $request)
    {
        // Inicializar variables
        $urlphoto = null;
        $urlphotoDoc = null;
        $role = 'user';

        // Verificar si ownerId viene en la solicitud, si no, asignar un valor por defecto
        $ownerId = $request->input('ownerId') ?? 'd33b3162-2057-4079-8447-bcfd3e52960c';

        // Validación de los atributos de entrada
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'typeDoc' => ['required', 'string', 'max:100'],
            'numberDoc' => ['required', 'string', 'max:80', 'unique:users,numberDoc'],
            'phone' => ['required', 'string', 'max:50'],
            'cellphone' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:80', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:20'],
            'photo' => ['nullable', 'file', 'max:2048'],
            'photoDoc' => ['nullable', 'file', 'max:2048'],
        ]);

        // Generar el UUID para el campo 'id'
        $attributes['id'] = Str::uuid();

        // Encriptar la contraseña
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['ownerId'] = $ownerId;
        $attributes['level'] = 1;
        $attributes['isActive'] = true;
        $attributes['role'] = 'user';

        // Crear el usuario sin imágenes aún
        $user = User::create($attributes);

        // Subir la imagen photo
        $image_photo = $request->file('photo');
        if ($image_photo) {
            // Poner nombre único
            $image_photo_name = time() . $image_photo->getClientOriginalName();

            // Guardarla en la carpeta storage (storage/app/photousers)
            Storage::disk('photousers')->put($image_photo_name, File::get($image_photo));

            // Setear el nombre de la imagen en el campo photo del usuario
            $user->update(['photo' => $image_photo_name]);
        }

        // Subir la imagen photoDoc
        $image_photoDoc = $request->file('photoDoc');
        if ($image_photoDoc) {
            // Poner nombre único
            $image_photoDoc_name = time() . $image_photoDoc->getClientOriginalName();

            // Guardarla en la carpeta storage (storage/app/photoDocusers)
            Storage::disk('photoDocusers')->put($image_photoDoc_name, File::get($image_photoDoc));

            // Setear el nombre de la imagen en el campo photoDoc del usuario
            $user->update(['photoDoc' => $image_photoDoc_name]);
        }

        // Redirigir al index de users con un mensaje de éxito
        session()->flash('success', 'La cuenta ha sido creada correctamente.');
        return to_route('users-store');
    }  

    public function update(Request $request, User $user)
    {
        // Validar los demás campos, excluyendo el `numberDoc` y `email` por ahora
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'typeDoc' => ['required', 'string', 'max:100'],
            'numberDoc' => ['required', 'string', 'max:80'],
            'role' => ['required', 'string', 'max:80'],
            'level' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:50'],
            'cellphone' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50'],
            'isActive' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:80'],
            'photo' => ['nullable', 'file', 'max:2048'],
            'photoDoc' => ['nullable', 'file', 'max:2048'],
        ]);

        // Si se envió una nueva contraseña, encriptarla
        if ($request->filled('password')) {
            $attributes['password'] = bcrypt($request->input('password'));
        } else {
            // Si no hay nueva contraseña, excluir este campo para que no se sobreescriba
            unset($attributes['password']);
        }

        // Subir la imagen photo si se adjunta una nueva
        $image_photo = $request->file('photo');
        if ($image_photo) {
            // Poner nombre único
            $image_photo_name = time() . '_' . $image_photo->getClientOriginalName();

            // Guardarla en la carpeta storage (storage/app/users)
            Storage::disk('photousers')->put($image_photo_name, File::get($image_photo));

            // Actualizar el campo photo del usuario
            $attributes['photo'] = $image_photo_name;
        }

        // Subir la imagen photoDoc si se adjunta una nueva
        $image_photoDoc = $request->file('photoDoc');
        if ($image_photoDoc) {
            // Poner nombre único
            $image_photoDoc_name = time() . '_' . $image_photoDoc->getClientOriginalName();

            // Guardarla en la carpeta storage (storage/app/users)
            Storage::disk('photoDocusers')->put($image_photoDoc_name, File::get($image_photoDoc));

            // Actualizar el campo photoDoc del usuario
            $attributes['photoDoc'] = $image_photoDoc_name;
        }

        // Actualizar el usuario con los atributos
        $user->update($attributes);

        // Redirigir al index de users con un mensaje de éxito
        session()->flash('success', 'La cuenta ha sido actualizada correctamente.');
        return to_route('users-management');
    }

    public function detail(Request $request, $id)
    {
        $user = User::find($id); 
        $userId = $user->id;

        // Llamar al servicio para obtener el balance del usuario autenticado usando su ID
        $balanceString = $this->userBalanceService->getBalanceByUser($userId);

         // Total comisión del usuario en el mes actual
        $totalCommission = $this->totalCommission($userId);

        // Membresias de los ultimos 6 meses
        $memberships = UserMembership::where('user', $userId)
          ->where('created_at', '>=', Carbon::now()->subMonths(6)) // Filtrar por los últimos 6 meses
          ->orderBy('created_at', 'desc')
          ->paginate(6);

        $myWallets = wallet_transactions::where('user', $userId)->orderBy('created_at', 'desc')
            ->paginate(4);

        $diaActual = Carbon::now()->locale('es')->translatedFormat('l d \d\e F \d\e\l Y');
        //$diaActual = Carbon::now()->locale('es')->translatedFormat('j \d\e F Y');
        
        $startOfMonth = Carbon::now()->startOfMonth()->format('d'); // Primer día del mes
        $endOfMonth = Carbon::now()->endOfMonth()->format('d'); // Último día del mes
        $monthAndYear = Carbon::now()->format('F Y'); // Mes en inglés y año

        Carbon::setLocale('es');
        $monthAndYear = Carbon::now()->locale('es')->translatedFormat('F Y');

        $rangoDias = $startOfMonth . ' - ' . $endOfMonth . ' ' . $monthAndYear;
        

        return view('Users/user-managementdetail', compact(
            'user',
            'diaActual',
            'rangoDias',
            'balanceString',
            'totalCommission',
            'memberships',
            'myWallets'
        ));
    }

    public function getImage($filename)
    {
      // Obtener imagen de avatar
      $file = Storage::disk('photousers')->get($filename);
      return new Response($file, 200);
    }

    public function getImageDoc($filename)
    {
      // Obtener imagen de soporte de pago
      $file = Storage::disk('photoDocusers')->get($filename);
      return new Response($file, 200);
    }

    public function misReferidos()
    {
        $currency = 'USD';

        // Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        $misusers1 = DB::table('users')
            ->where('ownerId', $id)         
            ->join('user_memberships', 'user_memberships.user', '=', 'users.id') 
            ->where('status', 'Activo')           
            ->get();

        $userId = Auth::id(); // Usuario autenticado

        $referidos = DB::table('users')
        ->leftJoin('user_memberships', 'user_memberships.user_email', '=', 'users.email')
        ->where(function ($query) use ($userId) {
            $query->where('user_memberships.membresiaPadre', $userId)
                  ->orWhere('users.ownerId', $userId);
        })
        ->select('users.id', 'users.name', 'users.lastname', 'users.email', 'users.isActive', 'user_memberships.id as membership_id')
        ->get();

        $networktransactions = DB::select('SELECT u.*, nt.*   
        FROM network_transactions as nt
        INNER JOIN user_memberships as um ON nt.userMembership = um.id
        INNER JOIN users as u ON um.user = u.id
        WHERE nt.type="Activation" AND
        nt.user = ?', [$id]);

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();


        return view('Users.misReferidos', [
          'user' => $user,
          'misusers1' => $misusers1,
          'networktransactions' => $networktransactions,
          'referidos' => $referidos,
          'total' => $total,
          'price' => $price,
          'currency' => $currency,
          'totalCommission' => $totalCommission,
          'totalProduction' => $totalProduction
          
        ]);

    }

    public function miRed()
    {
        $currency = 'USD';
        
        // Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        $misusers1 = DB::table('users')
            ->where('ownerId', $id)         
            ->join('user_memberships', 'user_memberships.user', '=', 'users.id') 
            ->where('status', 'Activo')           
            ->get();

        $userId = Auth::id(); // Usuario autenticado

        $referidos = DB::table('users')
        ->leftJoin('user_memberships', 'user_memberships.user_email', '=', 'users.email')
        ->where(function ($query) use ($userId) {
            $query->where('user_memberships.membresiaPadre', $userId)
                  ->orWhere('users.ownerId', $userId);
        })
        ->select('users.id', 'users.name', 'users.lastname', 'users.email', 'users.isActive', 'user_memberships.id as membership_id')
        ->get();

        //dd($referidos);

        $networktransactions = DB::select('SELECT u.*, nt.*   
        FROM network_transactions as nt
        INNER JOIN user_memberships as um ON nt.userMembership = um.id
        INNER JOIN users as u ON um.user = u.id
        WHERE nt.type="Activation" AND
        nt.user = ?', [$id]);

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();


        return view('Users.miRed', [
          'user' => $user,
          'misusers1' => $misusers1,
          'networktransactions' => $networktransactions,
          'referidos' => $referidos,
          'total' => $total,
          'price' => $price,
          'currency' => $currency,
          'totalCommission' => $totalCommission,
          'totalProduction' => $totalProduction
          
        ]);

    }

    private function totalCommission($userId)
    {
        // Total de comisión por activación de membresías de usuarios referidos
        $totalCommission = DB::table("network_transactions")
            ->where('user', $userId)
            ->where('type', 'Activation')
            ->sum("value");

        return $totalCommission;
    }
}
