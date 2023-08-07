<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombres' => 'required',
            'apellidos' => 'required',
            'nombreUsuario' => 'required',
            'fechaCumple' => 'required|date|before:' . now()->subYears(18)->format('Y-m-d'),
        ];
    }

    public function messages()
    {
        return [
            'nombres' => 'campo nombre es requerido',
            'apellidos' => 'campo apellidos es requerido',
            'nombreUsuario' => 'campo nombre de usuario es requerido',
            'fechaCumple' => 'el cliente debe ser mayor de edad',
        ];
    }
}
