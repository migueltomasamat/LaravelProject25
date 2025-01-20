<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=>'required|max:255|string',
            'address'=>'string|max:255',
            'email'=>'email',
            'password'=>'alpha_num|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'El nombre del usuario es obligatorio',
            'name.max'=>'Usuario demasiado largo',
            'name'=>'Error en el nombre de usuario',
            'address'=>'Error en la direccion',
            'email'=>'Error en el email',
            'password'=>'Error en el usuario'
        ];
    }
}
