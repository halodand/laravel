@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.currency.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.currencies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $currency->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.jenis') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Currency::JENIS_RADIO[$currency->jenis] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.img_page') }}
                                    </th>
                                    <td>
                                        @if($currency->img_page)
                                            <a href="{{ $currency->img_page->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $currency->img_page->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.nama') }}
                                    </th>
                                    <td>
                                        {{ $currency->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.jual') }}
                                    </th>
                                    <td>
                                        {{ $currency->jual }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.beli') }}
                                    </th>
                                    <td>
                                        {{ $currency->beli }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.diskon') }}
                                    </th>
                                    <td>
                                        {{ $currency->diskon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.no_currency') }}
                                    </th>
                                    <td>
                                        {{ $currency->no_currency }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.nama_currency') }}
                                    </th>
                                    <td>
                                        {{ $currency->nama_currency }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.min_trans') }}
                                    </th>
                                    <td>
                                        {{ $currency->min_trans }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.max_trans') }}
                                    </th>
                                    <td>
                                        {{ $currency->max_trans }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Currency::STATUS_RADIO[$currency->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.currencies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#diskon_transactions" aria-controls="diskon_transactions" role="tab" data-toggle="tab">
                            {{ trans('cruds.transaction.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="diskon_transactions">
                        @includeIf('admin.currencies.relationships.diskonTransactions', ['transactions' => $currency->diskonTransactions])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection