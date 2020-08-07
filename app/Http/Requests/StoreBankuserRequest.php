<?php

namespace App\Http\Requests;

use App\Models\Bankuser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBankuserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bankuser_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'id_partner_id'  => [
                'required',
                'integer',
            ],
            'nama_id'        => [
                'required',
                'integer',
            ],
            'nomor_rekening' => [
                'string',
                'required',
            ],
            'atas_nama'      => [
                'string',
                'required',
            ],
        ];
    }
}
