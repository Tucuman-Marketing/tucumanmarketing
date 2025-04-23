<?php

namespace Modules\Blog\Http\Requests;

use Modules\Blog\Entities\BlogStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBlogStatusRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'nullable',
            ],
            'color' => [
                'string',
                'max:255',
                'nullable',
            ],
            'sort_order' => [
                'string',
                'max:255',
                'nullable',
            ],
            'icon' => [
                'string',
                'max:255',
                'nullable',
            ],

        ];
    }
}
