<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBlogRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:blogs,id',
        ];
    }
}
