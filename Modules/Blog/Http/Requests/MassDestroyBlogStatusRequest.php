<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBlogStatusRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:blog_statuses,id',
        ];
    }
}
