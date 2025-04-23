<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlogTagRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'nullable',
                'unique:blog_tags',
            ],
            'color' => [
                'string',
                'max:255',
                'nullable',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'name.nullable' => 'El nombre es opcional.',
            'name.unique' => 'El nombre ya existe en la tabla de etiquetas de blog.',
            'color.string' => 'El color debe ser una cadena de texto.',
            'color.max' => 'El color no debe exceder los 255 caracteres.',
            'color.nullable' => 'El color es opcional.',
        ];
    }
}
