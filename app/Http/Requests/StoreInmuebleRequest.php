<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInmuebleRequest extends FormRequest
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
            'numcat'=>'required|max:20|unique:inmuebles',
            'direccion'=>'required|max:255',
            'numero'=>'required|integer',
            'bloque'=>'nullable',
            'piso'=>'nullable|integer',
            'puerta'=>'nullable|alpha_num:ascii',
            'ciudad_id'=>'exists:ciudads,id',
            'propietario_id'=>'exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'numcat.required'=>'La petición debe contener el número catastral',
            'numcat.max'=>'El campo debe tener 20 caracteres',
            'numcat.unique'=>'El número de catastro ya está registrado',
            'direccion.required'=>'Se requiere un campo dirección',
            'direccion.required'=>'Campo dirección demasiado largo',
            'numero.integer'=>'El piso debe ser un númerico entero',
            'piso.integer'=>'El piso debe ser un númerico entero',
            'puerta'=>'Se requiere una caracter alfanumérico',
            'ciudad_id'=>'Se requiere un númerico entero entre 1 y 8134',
            'propietario_id'=>'Se requiere un idenficador númerico'
        ];
    }
}
