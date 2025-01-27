<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateInmuebleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        $inmueble = $this->route('inmueble');
        if ($user->hasRole('Admin')){
            return true;
        }else{

            if ($user->hasPermissionTo('editar inmueble')
                and $user->id==$inmueble->propietario_id){
                return true;
            }else{
                return false;
            }
        }
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
