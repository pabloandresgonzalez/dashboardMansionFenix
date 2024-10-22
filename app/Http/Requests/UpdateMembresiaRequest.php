<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMembresiaRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'isActive' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'valor' => 'required|string|max:255',
            'image' => 'file',
            ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Es necesario ingresar el nombre',
            'isActive.required' => 'Es necesario ingresar el estado',
            'detail.required' => 'Es necesario ingresar el detalle',
            'valor.required' => 'Es necesario ingresar el valor',
        ];
    }
}
