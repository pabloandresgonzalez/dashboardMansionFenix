<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membresia extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'valor',
        'image',
        'isActive',
        'detail',
    ];
}
