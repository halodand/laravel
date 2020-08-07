<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'jenis'         => [
                'required',
            ],
            'nama'          => [
                'string',
                'required',
            ],
            'jual'          => [
                'required',
            ],
            'beli'          => [
                'required',
            ],
            'no_currency'   => [
                'string',
                'nullable',
            ],
            'nama_currency' => [
                'string',
                'nullable',
            ],
            'min_trans'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'max_trans'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
