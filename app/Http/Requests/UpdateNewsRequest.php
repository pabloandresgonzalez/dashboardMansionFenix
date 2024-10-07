<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:4|max:255',
            'intro' => 'required|string|max:255',
            'detail' => 'required|string|max:2000',
            'isActive' => 'required|boolean',
            'image' => 'nullable|file|image|max:2048', // Opcional pero con reglas para archivos de imagen
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Es necesario ingresar el título.',
            'intro.required' => 'Es necesario ingresar la introducción.',
            'detail.required' => 'Es necesario ingresar los detalles.',
            'isActive.required' => 'Es necesario definir el estado.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.max' => 'El tamaño de la imagen no debe superar los 2MB.',
        ];
    }
}