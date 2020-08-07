<?php

namespace App\Http\Requests;

use App\Models\Broker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBrokerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('broker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'judul_kat'        => [
                'string',
                'required',
            ],
            'judul_perusahaan' => [
                'string',
                'required',
            ],
            'kantor_pusat'     => [
                'string',
                'nullable',
            ],
            'tahun_berdiri'    => [
                'string',
                'nullable',
            ],
            'badan_regulasi'   => [
                'string',
                'nullable',
            ],
            'website'          => [
                'string',
                'nullable',
            ],
            'link_broker'      => [
                'string',
                'nullable',
            ],
            'stok'             => [
                'string',
                'required',
            ],
            'no_broker'        => [
                'string',
                'required',
            ],
            'nama_broker'      => [
                'string',
                'nullable',
            ],
            'status_transaksi' => [
                'required',
            ],
            'min_transaksi'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'max_transaksi'    => [
                'string',
                'required',
            ],
            'komisi_ib'        => [
                'string',
                'nullable',
            ],
            'komisi_pemilik'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
