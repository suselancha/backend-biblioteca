<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class StoreStaffRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'dni' => ['required', 'string', 'unique:users,dni', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'surname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'password' => [
                'required',
                'confirmed',
                //PasswordRules::min(8)->letters()->symbols()->numbers()
                PasswordRules::min(8)
            ],
            'role_id' => ['required', 'exists:roles,id'],
        ];
    }

    public function messages() {
        return [
            'dni' => 'El dni es obligatorio',
            'dni.unique' => 'El dni ya esta registrado',
            'dni.regex' => 'El dni debe contener solo números',
            'surname' => 'El apellido es obligatorio',
            'name' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es válido',
            'email.unique' => 'El correo ya esta registrado',
            'address' => 'La dirección es obligatoria',
            'phone' => 'El nro. teléfono es obligatorio',
            'password.required' => 'La clave es obligatoria',
            'password.confirmed' => 'Confirmación de clave inválida',
            'password' => 'El password debe contener al menos 8 caracteres',
            //'password' => 'El password debe contener al menos 8 caracteres, 1 símbolo y un número',
            'role_id.required' => 'El rol es obligatorio',
            'role_id.exists' => 'Rol no existe'
        ];
    }
}
