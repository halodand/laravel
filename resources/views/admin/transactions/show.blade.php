@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.transaction.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $transaction->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.no_order') }}
                                    </th>
                                    <td>
                                        {{ $transaction->no_order }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.id_partner') }}
                                    </th>
                                    <td>
                                        {{ $transaction->id_partner->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.jenis_currency') }}
                                    </th>
                                    <td>
                                        {{ $transaction->jenis_currency->jenis ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.bank') }}
                                    </th>
                                    <td>
                                        {{ $transaction->bank->email ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.currency_member') }}
                                    </th>
                                    <td>
                                        {{ $transaction->currency_member->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.nilai_depo') }}
                                    </th>
                                    <td>
                                        {{ $transaction->nilai_depo->beli ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.kurs_wd') }}
                                    </th>
                                    <td>
                                        {{ $transaction->kurs_wd->beli ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.diskon') }}
                                    </th>
                                    <td>
                                        {{ $transaction->diskon->diskon ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.jumlahusd') }}
                                    </th>
                                    <td>
                                        {{ $transaction->jumlahusd->min_trans ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.total') }}
                                    </th>
                                    <td>
                                        {{ $transaction->total }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.ket') }}
                                    </th>
                                    <td>
                                        {{ $transaction->ket }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Transaction::STATUS_SELECT[$transaction->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.diproses') }}
                                    </th>
                                    <td>
                                        {{ $transaction->diproses->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
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