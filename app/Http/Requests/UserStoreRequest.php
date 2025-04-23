<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:4',

        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'No ingreso un nombre.',
            'lastname.required' => 'No ingreso un apellido.',
            'email.unique' => 'El e-mail ya se encuentra registrado.',
            'email.required' => 'Ingrese un e-mail.',
            'email' => 'Ingrese un e-mail Valido.',
            'password.required' => 'no ingreso un password.',
            'password.min' => 'El password tienen que ser mayor a 4 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }

}
