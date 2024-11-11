<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NetworkTransaction extends Model
{
    use HasFactory;

   // Relación uno a muchos inversa: Este modelo pertenece a un solo usuario (User)
    public function users() {
        return $this->belongsTo('App\User', 'id');
    }

    // Relación uno a muchos inversa: Este modelo pertenece a un solo usuario (User)
    public function asuser() {
        return $this->belongsTo(User::class); // Usa la clave foránea predeterminada 'user_id' para la relación.
    }

    // Relación uno a muchos: Este modelo tiene muchos registros asociados en UserMembership
    public function UserMembership() {
        return $this->hasMany('App\UserMembership'); // Define la relación con el modelo UserMembership.
    }

    // Relación uno a muchos: Este modelo tiene muchos UserMembership ordenados por id descendente
    public function asUserMembership() {
        return $this->hasMany(UserMembership::class, 'user') // Utiliza 'user' como clave foránea
                    ->orderBy('id', 'desc'); // Ordena los registros por id en orden descendente.
    }
}
