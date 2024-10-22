<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\AutoGenerateUuid;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'lastname',
        'typeDoc',
        'numberDoc',
        'role',
        'phone',
        'cellphone',
        'country',
        'level',
        'photo',
        'photoDoc',
        'isActive',
        'ownerId',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Este método se ejecuta automáticamente cuando se crea un nuevo modelo
    protected static function boot()
    {
        parent::boot();

        // Antes de crear el modelo, generamos el UUID
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::uuid(); // Genera el UUID
            }
        });
    }

    public function UserMembership() {
        return $this->hasMany('App\UserMembership');
    }

    public function asUserMembership() {
        return $this->hasMany(UserMembership::class, 'user')->orderBy('id', 'desc');
    }

    //Relacion
    public function membresias(){
        return $this->belongsTo('App\Membresia', 'id');
    }

    public function amembresia(){
        return$this->belongsTo(Membresia::class);
    }
    
}
