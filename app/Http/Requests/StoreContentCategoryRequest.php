<?php

namespace App\Http\Requests;

use App\Models\ContentCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContentCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('content_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
