<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'bank_id' => [
                'required',
                'integer',
            ],
            'currency_member_id' => [
                'required',
                'integer',
            ],
            'nilai_depo_id' => [
                'nullable',
                'integer',
            ],
            'kurs_wd_id' => [
                'nullable',
                'integer',
            ],
            'jumlahusd_id' => [
                'required',
                'integer',
            ],
            'total' => [
                'required',
            ],
            'diproses_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
