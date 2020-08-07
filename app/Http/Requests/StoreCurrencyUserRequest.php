<?php

namespace App\Http\Requests;

use App\Models\CurrencyUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCurrencyUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('currency_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'id_partner_id' => [
                'required',
                'integer',
            ],
            'nama_id'       => [
                'required',
                'integer',
            ],
            'no_account'    => [
                'string',
                'required',
            ],
        ];
    }
}
