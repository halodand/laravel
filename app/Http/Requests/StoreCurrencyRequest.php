<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('currency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'jenis'         => [
                'required',
            ],
            'img_page'      => [
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
