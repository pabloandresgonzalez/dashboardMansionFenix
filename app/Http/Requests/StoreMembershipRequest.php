<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembershipRequest extends FormRequest
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
            'id_membresia' => 'required|string',  //|unique:user_memberships|min:4 
            'hashUSDT' => 'required|max:255|unique:user_memberships', //|unique:user_memberships
            'hashPSIV' => 'required|max:255|unique:user_memberships', //|unique:user_memberships
            'image' => 'file',
        ];
    }
}
