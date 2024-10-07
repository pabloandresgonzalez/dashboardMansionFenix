<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:4|max:150',
            'intro' => 'required|string|max:200',
            'detail' => 'required|string|max:2000',            
            'isActive' => 'required|boolean',
            'image' => 'nullable|image|max:2048', // Solo permitir imágenes
            'url_video' => 'nullable|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Es necesario ingresar el nombre',
            'intro.required' => 'Es necesario ingresar el intro',
            'detail.required' => 'Es necesario ingresar el detalle',
            'isActive.required' => 'Es necesario ingresar el estado',
            'image.image' => 'El archivo debe ser una imagen válida',
            'image.max' => 'La imagen no debe exceder los 2MB',
        ];
    }
}
