<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

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
            'bank_id'            => [
                'required',
                'integer',
            ],
            'currency_member_id' => [
                'required',
                'integer',
            ],
            'nilai_depo_id'      => [
                'required',
                'integer',
            ],
            'kurs_wd_id'         => [
                'required',
                'integer',
            ],
            'jumlahusd_id'       => [
                'required',
                'integer',
            ],
            'total'              => [
                'required',
            ],
            'diproses_id'        => [
                'required',
                'integer',
            ],
        ];
    }
}
