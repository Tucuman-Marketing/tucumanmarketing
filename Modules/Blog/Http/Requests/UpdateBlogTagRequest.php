<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBlogTagRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'nullable',
                'unique:blog_tags,name,' . $this->request->get('uuid') . ',uuid',

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
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'name.unique' => 'El nombre del tag ya existe.',
            'color.string' => 'El color debe ser una cadena de texto.',
            'color.max' => 'El color no puede tener más de 255 caracteres.',
        ];
    }

}
