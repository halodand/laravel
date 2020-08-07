<?php

namespace App\Http\Requests;

use App\Models\Bank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBankRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama'           => [
                'string',
                'required',
            ],
            'nomor_rekening' => [
                'string',
                'required',
            ],
            'atasnama'       => [
                'string',
                'required',
            ],
        ];
    }
}
