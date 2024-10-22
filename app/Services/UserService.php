<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * Obtener todos los usuarios inscritos y el total de usuarios.
     *
     * @param int|null $ownerId Si se proporciona, filtra por este ownerId.
     * @return array
     */
    public function getAllEnrolledUsers($ownerId = null)
    {
        // Conseguir usuario identificado
        $user = \Auth::user();
        $ownerId = $user->id;

        // Si se proporciona un ownerId, aplicamos el filtro
        $query = DB::table('users');

        if ($ownerId) {
            $query->where('ownerId', $ownerId);
        }

        // Obtener el total de usuarios
        $totalUsers = $query->count();

        // Obtener la lista de usuarios
        $users = $query->get();

        // Retornar un array con el total y los usuarios
        return [
            'total' => $totalUsers,
            'users' => $users,
        ];
    }
}