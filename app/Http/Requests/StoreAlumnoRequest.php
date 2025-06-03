<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'apellido_materno' => 'nullable|string|max:100',
            'correo_electronico' => 'required|email|unique:alumnos,correo_electronico',
            'sede_id' => 'required|Integer|exists:sedes,id', 
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido.',
            'apellido.required' => 'El apellido paterno es requerido.',
            'correo_electronico.required' => 'El correo es requerido.',
            'correo_electronico.email' => 'El campo correo no cumple con un formato válido.',
            'correo_electronico.unique' => 'Este correo ya se encuentra registrado.',
            'sede_id.required' => 'La sede es requerida.',
            'sede_id.integer' => 'La sede debe ser un número entero.',
            'sede_id.exists' => 'La sede seleccionada no es valida',
        ];
    }
}
