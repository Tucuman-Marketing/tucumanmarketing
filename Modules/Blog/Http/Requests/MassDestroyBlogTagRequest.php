<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBlogTagRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:blog_tags,id',
        ];
    }
}
