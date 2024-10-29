<?php

namespace App\Http\Controllers;

use App\Models\UserMembership;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\membresia;
use Illuminate\Support\Facades\File;
use App\Mail\MembershipCreatedMessage;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserMembershipController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = UserMembership::orderBy('updated_at', 'Desc')->paginate(8);
        //$data = ['memberships' => $memberships];

        // Obtener el total de usuarios y la lista
        $data1 = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $total = $data1['total'];

        $fecha_actual = date("Y-m-d H:i:s");

        // Retornar la vista con un array asociativo
        return view('Memberships.index', [
            'memberships' => $memberships,
            'total' => $total,
            'inactivarInput' => true,
            'fecha_actual' => $fecha_actual
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
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
            'hashPSIV' => 'max:255|unique:user_memberships', //|unique:user_memberships
            'image' => 'file',             
            
        ]);

       $this->validate($request, $rules);

       $namemembresia = $request->input('name');

       $membershipsuser = UserMembership::where('user', $user->id)
        ->Where('membership', $namemembresia)
        ->where('status', 'Activo')
        ->get()->toArray();

        if ($membershipsuser) {

            return redirect()->route('membresias.index')->with('alert', '¡' . $name . ' ' .'¡Ya cuentas con una membresia de este valor activa!');      
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
        $user_email = User::where('role', 'admin')->first();
        $user_email_admin = $user_email->email;
        $user_email_admin2 = 'pabloandres6@gmail.com';//'soportefuturslatinoamerica@gmail.com';
        
        Mail::to($user_email_admin)->send(new MembershipCreatedMessage($membership));
        Mail::to($user_email_admin2)->send(new MembershipCreatedMessage($membership));

        return redirect()->route('membership.index')->with('success', '¡Membresía comprada con éxito!');        

    }

    /**
     * Display the specified resource.
     */
    public function show(UserMembership $userMembership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserMembership $userMembership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserMembership $userMembership)
    {
        // Verificar que los datos lleguen correctamente
        //dd($request->all());

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

            // Verificar que la fecha se haya formateado correctamente
            //dd($fechaFormateada);

            // Actualizar el modelo usando asignación masiva
            $userMembership->fill([
                'activedAt' => $fechaFormateada,
                'status' => $validatedData['status'],
                'closedAt' => $this->calculateClosedAt(), // Método para calcular la fecha final
                'detail' => $validatedData['status'],
            ]);

            // Verificar los datos antes de guardar
            //dd($userMembership->toArray());

            // Guardar el modelo
            $userMembership->save();

            // Confirmar la transacción
            DB::commit();

            // Redirigir con éxito
            return redirect()->route('membership.index')->with('success', '¡Membresía actualizada con éxito!');

        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();
            return redirect()->route('membership.index')->withErrors('Hubo un problema al actualizar la membresía: ' . $e->getMessage());
        }
    }

    public function misMemberships()
    {
        //Conseguir usuario identificado
        $user = \Auth::user();
        $username = $user->name;

        $memberships = UserMembership::where('user', $user->id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        // Obtener el total de usuarios y la lista
        $data1 = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $total = $data1['total'];

        $fecha_actual = date("Y-m-d H:i:s");

        // Retornar la vista con un array asociativo
        return view('Memberships.mismemberships', [
            'memberships' => $memberships,
            'total' => $total,
            'inactivarInput' => true,
            'fecha_actual' => $fecha_actual
        ]);
    }

    /**
     * Calcula la fecha de cierre evitando fines de semana.
     *
     * @return string
     */
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
}
