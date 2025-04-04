<?php

namespace App\Http\Controllers;

use App\Models\membresia;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMembresiaRequest;
use App\Models\UserMembership;
use App\Services\UserService;
use App\Services\BlockchainService;
use App\Services\CommissionService;
use App\Services\ProductionService;
use Illuminate\Support\Facades\Crypt;


class MembresiaController extends Controller
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

    public function index()
    {
        $currency = 'USD';

        $membresias = Membresia::orderBy('updated_at', 'Desc')->paginate(8);

        // Generar un token para cada membresía
        foreach ($membresias as $membresia) {
            $membresia->form_token = Crypt::encryptString(json_encode([
                'id_membresia' => $membresia->id,
                'name' => $membresia->name,
            ]));
        }

        $data = ['membresias' => $membresias];

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();

        // Retornar la vista con un array asociativo
        return view('Membresias.index', [
            'membresias' => $membresias,
            'total' => $total,
            'price' => $price,
            'currency' => $currency,
            'totalCommission' => $totalCommission,
            'totalProduction' => $totalProduction
        ]);
    }

    public function indexAdmin()
    {
        $currency = 'USD';
        
        $membresias = Membresia::orderBy('updated_at', 'Desc')->paginate(8);
        $data = ['membresias' => $membresias];

        // Obtener el total de usuarios y la lista
        $data = $this->userService->getAllEnrolledUsers();
        $total = $data['total'];

        // Obtenemos el precio de la criptomoneda en la moneda solicitada
        $price = $this->blockchainService->getCryptoPrice($currency);

        $totalCommission = $this->commissionService->getTotalCommission();

        $totalProduction = $this->productionService->getMonthlyUtility();

        

        // Retornar la vista con un array asociativo
        return view('Membresias.indexAdmin', [
            'membresias' => $membresias,
            'total' => $total,
            'price' => $price,
            'currency' => $currency,
            'totalCommission' => $totalCommission,
            'totalProduction' => $totalProduction
        ]);
    }

    public function store(StoreMembresiaRequest $request)
    {
        // Crear el objeto News usando la validación previa del FormRequest
        $membresias = new Membresia();
        $membresias->name = $request->input('name');
        $membresias->isActive = $request->input('isActive');
        $membresias->valor = $request->input('valor');
        $membresias->detail = $request->input('detail');

        //Subir la imagen photo
        $image_photo = $request->file('image');
        if ($image_photo) {

        //Poner nombre unico
        $image_photo_name = time() . $image_photo->getClientOriginalName();

        //Guardarla en la carpeta storage (storage/app/photousers)
        Storage::disk('photousers')->put($image_photo_name, File::get($image_photo));

        //Seteo el nombre de la imagen en el objeto
        $membresias->image = $image_photo_name;
        }

        // Guardar la noticia en la base de datos
        $membresias->save();

        return redirect()->route('membresias.indexAdmin')->with('success', 'Membresía creada correctamente.');
    }

    public function update(StoreMembresiaRequest $request, $id)
    {
        // Actualizar los campos del objeto Membresia usando la validación previa del FormRequest
        $membresias = Membresia::findOrFail($id);
        $membresias->name = $request->input('name');
        $membresias->isActive = $request->input('isActive');
        $membresias->valor = $request->input('valor');
        $membresias->detail = $request->input('detail');

        // Subir la imagen photo si se adjunta una nueva
        $image_photo = $request->file('image');
        if ($image_photo) {
            // Poner nombre único
            $image_photo_name = time() . '_' . $image_photo->getClientOriginalName();

            // Guardarla en la carpeta storage (storage/app/users)
            Storage::disk('photousers')->put($image_photo_name, File::get($image_photo));

            // Actualizar el campo image del objeto Membresia
            $membresias->image = $image_photo_name;
        }

        // Guardar la membresía en la base de datos
        $membresias->save();

        return redirect()->route('membresias.indexAdmin')->with('success', 'Membresía actualizada correctamente.');
    }

}
