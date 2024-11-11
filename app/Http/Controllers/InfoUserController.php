<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class InfoUserController extends Controller
{
    //$this->middleware('auth');

    public function create(Request $request)
    {
        //Conseguir usuario identificado
        $user = \Auth::user();
        $iduser = $user->id;

        return view('Users/user-profile' , [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        // Inicializar variables
        $urlphoto = null;
        $urlphotoDoc = null;

        // Validación de los atributos de entrada
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:50'],
            'cellphone' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable', 'min:8', 'max:255'],
            'photo' => ['nullable', 'file', 'max:2048'],
            'photoDoc' => ['nullable', 'file', 'max:2048'],
        ]);

        // Verificar si hay una nueva contraseña para actualizar
        if (!empty($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        // Subir la imagen photo si se adjunta una nueva
        if ($request->hasFile('photo')) {
            $imagePhoto = $request->file('photo');
            $imagePhotoName = time() . '_photo_' . $imagePhoto->getClientOriginalName();
            Storage::disk('photousers')->put($imagePhotoName, File::get($imagePhoto));
            $urlphoto = $imagePhotoName; // Ruta para la base de datos
        }

        // Subir la imagen photoDoc si se adjunta una nueva
        if ($request->hasFile('photoDoc')) {
            $imagePhotoDoc = $request->file('photoDoc');
            $imagePhotoDocName = time() . '_photoDoc_' . $imagePhotoDoc->getClientOriginalName();
            Storage::disk('photoDocusers')->put($imagePhotoDocName, File::get($imagePhotoDoc));
            $urlphotoDoc = $imagePhotoDocName; // Ruta para la base de datos
        }

        // Actualizar el usuario por su ID
        User::where('id', auth()->user()->id)
            ->update([
                'name' => $attributes['name'],
                'lastname' => $attributes['lastname'],
                'phone' => $attributes['phone'],
                'cellphone' => $attributes['cellphone'],
                'country' => $attributes['country'],
                'email' => $attributes['email'],
                'password' => $attributes['password'] ?? auth()->user()->password,
                'photo' => $urlphoto ?? auth()->user()->photo, // Actualizar photo solo si se subió
                'photoDoc' => $urlphotoDoc ?? auth()->user()->photoDoc, // Actualizar photoDoc solo si se subió
            ]);

        // Redirigir con mensaje de éxito
        session()->flash('success', 'Perfil actualizado exitosamente.');

        return redirect('/user-profile');
    }

    public function getImage($filename)
    {
      // Obtener imagen de avatar
      $file = Storage::disk('photousers')->get($filename);
      return new Response($file, 200);
    }

}
