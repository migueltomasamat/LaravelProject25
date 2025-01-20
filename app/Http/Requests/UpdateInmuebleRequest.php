<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInmuebleRequest extends FormRequest
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
            'numcat'=>'max:20|unique',
            'direccion'=>'max:255',
            'numero'=>'integer',
            'bloque'=>'nullable|alpha_num:ascii',
            'piso'=>'nullable|integer',
            'puerta'=>'nullable|alpha_num:ascii',
            'ciudad_id'=>'exists:ciudads,id',
            'propietario_id'=>'exists:user,id'
        ];
    }
}
