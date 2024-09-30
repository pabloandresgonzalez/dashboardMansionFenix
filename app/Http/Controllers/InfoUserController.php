<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        return view('Users/user-profile');
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
            'typeDoc' => ['required', 'string', 'max:100'],
            'numberDoc' => ['required', 'string', 'max:80'],
            'role' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:50'],
            'cellphone' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50'],
            'level' => ['required', 'string', 'max:20'],
            'isActive' => ['required', 'string', 'max:20'],
            //'ownerId' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable', 'min:8', 'max:255'],
        ]);

        // Verificar si hay una nueva contraseña para actualizar
        if (!empty($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            // No cambiar la contraseña si no se envía una nueva
            unset($attributes['password']);
        }

        // Actualizar el usuario por su ID (o cualquier otro identificador, ej. auth()->user()->id)
        User::where('id', auth()->user()->id)
            ->update([
                'name' => $attributes['name'],
                'lastname' => $attributes['lastname'],
                'typeDoc' => $attributes['typeDoc'],
                'numberDoc' => $attributes['numberDoc'],
                'role' => $attributes['role'],
                'phone' => $attributes['phone'],
                'cellphone' => $attributes['cellphone'],
                'country' => $attributes['country'],
                'level' => $attributes['level'],
                'isActive' => $attributes['isActive'],
                'email' => $attributes['email'],
                // Si existe la contraseña, se actualiza
                'password' => $attributes['password'] ?? auth()->user()->password,
            ]);

        // Redirigir al dashboard con un mensaje de éxito
        session()->flash('success', 'Perfil actualizado exitosamente.');
        return redirect('/user-profile');
    }

}
