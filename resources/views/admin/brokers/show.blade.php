@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.broker.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.brokers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $broker->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.judul_kat') }}
                                    </th>
                                    <td>
                                        {{ $broker->judul_kat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.judul_perusahaan') }}
                                    </th>
                                    <td>
                                        {{ $broker->judul_perusahaan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.kantor_pusat') }}
                                    </th>
                                    <td>
                                        {{ $broker->kantor_pusat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.tahun_berdiri') }}
                                    </th>
                                    <td>
                                        {{ $broker->tahun_berdiri }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.badan_regulasi') }}
                                    </th>
                                    <td>
                                        {{ $broker->badan_regulasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $broker->website }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.profil') }}
                                    </th>
                                    <td>
                                        {!! $broker->profil !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.jenis_akun') }}
                                    </th>
                                    <td>
                                        {!! $broker->jenis_akun !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.deskripsi_tambahan') }}
                                    </th>
                                    <td>
                                        {!! $broker->deskripsi_tambahan !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.kondisi_trading') }}
                                    </th>
                                    <td>
                                        {!! $broker->kondisi_trading !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.ket_broker') }}
                                    </th>
                                    <td>
                                        {!! $broker->ket_broker !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.rebate_auto_manual') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Broker::REBATE_AUTO_MANUAL_SELECT[$broker->rebate_auto_manual] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.link_broker') }}
                                    </th>
                                    <td>
                                        {{ $broker->link_broker }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.kurs_depo') }}
                                    </th>
                                    <td>
                                        {{ $broker->kurs_depo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.kurs_wd') }}
                                    </th>
                                    <td>
                                        {{ $broker->kurs_wd }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.stok') }}
                                    </th>
                                    <td>
                                        {{ $broker->stok }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.no_broker') }}
                                    </th>
                                    <td>
                                        {{ $broker->no_broker }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.nama_broker') }}
                                    </th>
                                    <td>
                                        {{ $broker->nama_broker }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.status_transaksi') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Broker::STATUS_TRANSAKSI_RADIO[$broker->status_transaksi] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.min_transaksi') }}
                                    </th>
                                    <td>
                                        {{ $broker->min_transaksi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.max_transaksi') }}
                                    </th>
                                    <td>
                                        {{ $broker->max_transaksi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.img_broker') }}
                                    </th>
                                    <td>
                                        @if($broker->img_broker)
                                            <a href="{{ $broker->img_broker->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $broker->img_broker->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.komisi_ib') }}
                                    </th>
                                    <td>
                                        {{ $broker->komisi_ib }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.broker.fields.komisi_pemilik') }}
                                    </th>
                                    <td>
                                        {{ $broker->komisi_pemilik }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.brokers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection