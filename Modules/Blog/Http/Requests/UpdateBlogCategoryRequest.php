<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBlogCategoryRequest extends FormRequest
{

    public function rules()
    {
        return [
            'uuid' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'max:255',
                'nullable',
                'unique:blog_categories,name,' . $this->request->get('uuid') . ',uuid',
            ],
            'slug' => [
                'string',
                'max:255',
                'nullable',
            ],
        ];
    }

    public function messages()
    {
        return [
            'uuid.string' => 'El UUID debe ser una cadena de texto.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'name.unique' => 'El nombre ya está en uso en la tabla de categorías.',
            'slug.string' => 'El slug debe ser una cadena de texto.',
            'slug.max' => 'El slug no debe exceder los 255 caracteres.',
        ];
    }


}
