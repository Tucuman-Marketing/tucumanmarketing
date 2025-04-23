<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'No ingreso un nombre.',
            'lastname.required' => 'No ingreso un apellido.',
        ];
    }


}
