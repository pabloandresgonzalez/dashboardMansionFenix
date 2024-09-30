<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
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
        ]);

        // Generar el UUID para el campo 'id'
        $attributes['id'] = Str::uuid();

        // Encriptar la contraseña
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['ownerId'] = $ownerId;
        $attributes['level'] = 1;
        $attributes['isActive'] = true;
        $attributes['role'] = 'user';

        // Crear el usuario y autenticar
        $user = User::create($attributes);
        Auth::login($user);

        // Redirigir al dashboard con un mensaje de éxito
        session()->flash('success', 'Tu cuenta ha sido creada correctamente.');
        return redirect('/dashboard');
    }  
}
