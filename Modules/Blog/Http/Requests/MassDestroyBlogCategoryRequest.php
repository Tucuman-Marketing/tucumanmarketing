<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBlogCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:blog_categories,id',
        ];
    }
}
