<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Models\wallet_transactions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store(Request $request)
    {
        // Registrar intento de registro en el log diario
        Log::channel('daily')->info('Intento de registro', [
            'email' => $request->email,
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'input_data' => $request->except(['password']) // Excluir la contraseña por seguridad
        ]);
        
        // Inicializar variables
        $urlphoto = null;
        $urlphotoDoc = null;
        $role = 'user';

        // Verificar si ownerId viene en la solicitud, si no, asignar un valor por defecto
        $ownerId = $request->input('ownerId') ?? '77d4dcbd-04c3-4e01-8ee8-df8c0fb0a23a';


        /*
        // Validación de los atributos de entrada
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'typeDoc' => 'required|in:Cedula,Pasaporte,Visa,Andorra,otro',
            'numberDoc' => ['required', 'string', 'max:80', 'unique:users,numberDoc'],
            'phone' => ['required', 'string', 'max:50'],
            'cellphone' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:80', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:20'],
        ]);
        */

        
        // Validación de los atributos de entrada
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/u'],
            'lastname' => ['required', 'string', 'max:50', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/u'],
            'typeDoc' => ['required', 'in:Cedula,Pasaporte,Visa,Andorra,otro'],
            'numberDoc' => ['required', 'string', 'max:80', 'unique:users,numberDoc', 'regex:/^\d{4,80}$/'],
            'phone' => ['required', 'string', 'max:50', 'regex:/^\+?\d{7,15}$/'], 
            'cellphone' => ['required', 'string', 'max:50', 'regex:/^\+?\d{7,15}$/'],
            //'country' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50', 'regex:/^\d+$/'],
            'email' => ['required', 'email', 'max:80', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,20}$/'],
            
        ]);

        // Registrar que la validación fue exitosa
        Log::channel('daily')->info('Validación de registro exitosa', ['email' => $request->email]);

        // Generar el UUID para el campo 'id'
        $attributes['id'] = Str::uuid();

        // Encriptar la contraseña
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['ownerId'] = $ownerId;
        $attributes['level'] = 1;
        $attributes['isActive'] = false;
        $attributes['role'] = 'user';

        // Crear el usuario y autenticar
        $user = User::create($attributes);   
        Auth::login($user);

        //Conseguir usuario identificado
        $user = Auth::user(); // Utilizar Auth::user() directamente después de login para asegurar que esté autenticado
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;

        /*
        // Crear la transacción de billetera del usuario insrcito en estado en canje para ser validado
        $walletTransaction = new wallet_transactions();
        $walletTransaction->user = $id;
        $walletTransaction->email = $email;
        $walletTransaction->fee = 0;
        $walletTransaction->value = 900;
        $walletTransaction->type = "Abono directo";
        $walletTransaction->hash = '';
        $walletTransaction->currency = 'USDT';
        $walletTransaction->approvedBy = '';
        $walletTransaction->wallet = $ownerId;
        $walletTransaction->inOut = 1;
        $walletTransaction->status = 'Aprobada';
        $walletTransaction->detail = 'Abono directo para afiliación';
        
        // Guardar la transacción en la base de datos
        $walletTransaction->save();
        */

        //$iduser = $request->input('ownerId')
        // Busca el usuario con el ID especificado
        $iduser = User::where('id', $ownerId)->first();
        $userid = $iduser->id;      // ID del usuario encontrado
        $useremail = $iduser->email; // Email del usuario encontrado
        

        // Crear la transacción de billetera del usuario que refirio por el %10 de la insrcipción en estado en canje
        $walletTransactionReferred = new wallet_transactions();
        $walletTransactionReferred->user = $userid;
        $walletTransactionReferred->email = $useremail;
        $walletTransactionReferred->fee = 0;
        $walletTransactionReferred->value = 100;
        $walletTransactionReferred->type = "Abono directo";
        $walletTransactionReferred->hash = '';
        $walletTransactionReferred->currency = 'PSIV';
        $walletTransactionReferred->approvedBy = '';
        $walletTransactionReferred->wallet = $ownerId;
        $walletTransactionReferred->inOut = 1;
        $walletTransactionReferred->status = 'Aprobada';
        $walletTransactionReferred->detail = 'Abono directo por afiliación';

        // Guardar la transacción en la base de datos
        $walletTransactionReferred->save();


        // Redirigir al dashboard con un mensaje de éxito
        session()->flash('success', 'Tu cuenta ha sido creada correctamente, estamos validando tú hash de afiliación, apenas este confirmado te avisaremos');
        return redirect('/dashboard');
    } 
}
