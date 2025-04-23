<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBlogPostRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:blog_posts,title,' . $this->request->get('uuid') . ',uuid',
            ],
            'slug' => [
                'string',
                'max:255',
                'nullable',
            ],
            'photo_gallery' => [
                'array',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'El título debe ser una cadena de texto.',
            'title.required' => 'El título es obligatorio.',
            'title.unique' => 'El título ya ha sido tomado.',
            'slug.string' => 'El slug debe ser una cadena de texto.',
            'slug.max' => 'El slug no debe exceder los 255 caracteres.',
            'photo_gallery.array' => 'La galería de fotos debe ser un arreglo.',
            'tags.*.integer' => 'Cada etiqueta debe ser un número entero.',
            'tags.array' => 'Las etiquetas deben ser un arreglo.',
        ];
    }
}
