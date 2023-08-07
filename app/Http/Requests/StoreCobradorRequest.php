<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCobradorRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
            'sueldo' => 'required',
            'telefono' => 'required',
            'email_empresa' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombres' => 'campo nombre es requerido',
            'apellidos' => 'campo apellidos es requerido',
            'nombreUsuario' => 'campo nombre de usuario es requerido',
            'fechaCumple' => 'el cliente debe ser mayor de edad',
            'email' => 'El correo ya existe',
            'sueldo' => 'El campo sueldo es requerido',
            'telefono' => 'El campo telefono es requerido',
            'email_empresa' => 'El correo de la empresa es requerido'
        ];
    }
}
