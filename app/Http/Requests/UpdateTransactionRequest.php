<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nilai_depo_id' => [
                'required',
                'integer',
            ],
            'kurs_wd_id'    => [
                'required',
                'integer',
            ],
            'jumlahusd_id'  => [
                'required',
                'integer',
            ],
            'ket'           => [
                'string',
                'nullable',
            ],
            'diproses_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}
