<?php

namespace App\Http\Controllers;

use App\Models\membresia;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMembresiaRequest;
use App\Services\UserService;
use App\Models\UserMembership;


class MembresiaController extends Controller
{
    // Inyectar el servicio a través del constructor
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

        $this->middleware('auth');
    }

    public function index()
    {
        $membresias = Membresia::orderBy('updated_at', 'Desc')->paginate(8);
        $data = ['membresias' => $membresias];

        // Obtener el total de usuarios y la lista
        $data1 = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $total = $data1['total'];

        // Retornar la vista con un array asociativo
        return view('Membresias.index', [
            'membresias' => $membresias,
            'total' => $total
        ]);
    }

    public function indexAdmin()
    {
        $membresias = Membresia::orderBy('updated_at', 'Desc')->paginate(8);
        $data = ['membresias' => $membresias];

        // Obtener el total de usuarios y la lista
        $data1 = $this->userService->getAllEnrolledUsers();
        //$users = $data['users'];
        $total = $data1['total'];

        // Retornar la vista con un array asociativo
        return view('Membresias.indexAdmin', [
            'membresias' => $membresias,
            'total' => $total
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
        $membresias->image = $request->input('image');

        // Subir la imagen solo si está presente
        if ($request->hasFile('image')) {
            // Poner nombre único a la imagen y guardarla en la carpeta de 'news_images'
            $imagePath = $request->file('image')->store('news_images', 'public'); //>store('news_images', 'public');
            // Guardar el nombre del archivo en el objeto News
            $membresias->image = $imagePath;
        }

        // Guardar la noticia en la base de datos
        $membresias->save();

        return redirect()->route('membresias.indexAdmin')->with('success', 'Membresía creada correctamente.');
    }

    public function update(StoreMembresiaRequest $request, $id)
    {
        // Actualizar los campos del objeto Mmembresia usando la validación previa del FormRequest
        $membresias = Membresia::findOrFail($id);
        $membresias->name = $request->input('name');
        $membresias->isActive = $request->input('isActive');
        $membresias->valor = $request->input('valor');
        $membresias->detail = $request->input('detail');

        // Subir la imagen solo si está presente
        if ($request->hasFile('image')) {
            // Poner nombre único a la imagen y guardarla en la carpeta de 'news_images'
            $imagePath = $request->file('image')->store('news_images', 'public'); //>store('news_images', 'public');
            // Guardar el nombre del archivo en el objeto News
            $membresias->image = $imagePath;
        }

        // Guardar la noticia en la base de datos
        $membresias->save();

        return redirect()->route('membresias.indexAdmin')->with('success', 'Membresía creada correctamente.');
    }

}
