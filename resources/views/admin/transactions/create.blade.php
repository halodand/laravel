@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.transactions.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('jenis_currency') ? 'has-error' : '' }}">
                            <label for="jenis_currency_id">{{ trans('cruds.transaction.fields.jenis_currency') }}</label>
                            <select class="form-control select2" name="jenis_currency_id" id="jenis_currency_id">
                                @foreach($jenis_currencies as $id => $jenis_currency)
                                    <option value="{{ $id }}" {{ old('jenis_currency_id') == $id ? 'selected' : '' }}>{{ $jenis_currency }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jenis_currency'))
                                <span class="help-block" role="alert">{{ $errors->first('jenis_currency') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.jenis_currency_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }}">
                            <label class="required" for="bank_id">{{ trans('cruds.transaction.fields.bank') }}</label>
                            <select class="form-control select2" name="bank_id" id="bank_id" required>
                                @foreach($banks as $id => $bank)
                                    <option value="{{ $id }}" {{ old('bank_id') == $id ? 'selected' : '' }}>{{ $bank }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank'))
                                <span class="help-block" role="alert">{{ $errors->first('bank') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.bank_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('currency_member') ? 'has-error' : '' }}">
                            <label class="required" for="currency_member_id">{{ trans('cruds.transaction.fields.currency_member') }}</label>
                            <select class="form-control select2" name="currency_member_id" id="currency_member_id" required>
                                @foreach($currency_members as $id => $currency_member)
                                    <option value="{{ $id }}" {{ old('currency_member_id') == $id ? 'selected' : '' }}>{{ $currency_member }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('currency_member'))
                                <span class="help-block" role="alert">{{ $errors->first('currency_member') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.currency_member_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_depo') ? 'has-error' : '' }}">
                            <label class="required" for="nilai_depo_id">{{ trans('cruds.transaction.fields.nilai_depo') }}</label>
                            <select class="form-control select2" name="nilai_depo_id" id="nilai_depo_id" required>
                                @foreach($nilai_depos as $id => $nilai_depo)
                                    <option value="{{ $id }}" {{ old('nilai_depo_id') == $id ? 'selected' : '' }}>{{ $nilai_depo }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nilai_depo'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_depo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.nilai_depo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kurs_wd') ? 'has-error' : '' }}">
                            <label class="required" for="kurs_wd_id">{{ trans('cruds.transaction.fields.kurs_wd') }}</label>
                            <select class="form-control select2" name="kurs_wd_id" id="kurs_wd_id" required>
                                @foreach($kurs_wds as $id => $kurs_wd)
                                    <option value="{{ $id }}" {{ old('kurs_wd_id') == $id ? 'selected' : '' }}>{{ $kurs_wd }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kurs_wd'))
                                <span class="help-block" role="alert">{{ $errors->first('kurs_wd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.kurs_wd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('diskon') ? 'has-error' : '' }}">
                            <label for="diskon_id">{{ trans('cruds.transaction.fields.diskon') }}</label>
                            <select class="form-control select2" name="diskon_id" id="diskon_id">
                                @foreach($diskons as $id => $diskon)
                                    <option value="{{ $id }}" {{ old('diskon_id') == $id ? 'selected' : '' }}>{{ $diskon }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('diskon'))
                                <span class="help-block" role="alert">{{ $errors->first('diskon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.diskon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jumlahusd') ? 'has-error' : '' }}">
                            <label class="required" for="jumlahusd_id">{{ trans('cruds.transaction.fields.jumlahusd') }}</label>
                            <select class="form-control select2" name="jumlahusd_id" id="jumlahusd_id" required>
                                @foreach($jumlahusds as $id => $jumlahusd)
                                    <option value="{{ $id }}" {{ old('jumlahusd_id') == $id ? 'selected' : '' }}>{{ $jumlahusd }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jumlahusd'))
                                <span class="help-block" role="alert">{{ $errors->first('jumlahusd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.jumlahusd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                            <label class="required" for="total">{{ trans('cruds.transaction.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01" required>
                            @if($errors->has('total'))
                                <span class="help-block" role="alert">{{ $errors->first('total') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transaction.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transaction::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('diproses') ? 'has-error' : '' }}">
                            <label class="required" for="diproses_id">{{ trans('cruds.transaction.fields.diproses') }}</label>
                            <select class="form-control select2" name="diproses_id" id="diproses_id" required>
                                @foreach($diproses as $id => $diproses)
                                    <option value="{{ $id }}" {{ old('diproses_id') == $id ? 'selected' : '' }}>{{ $diproses }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('diproses'))
                                <span class="help-block" role="alert">{{ $errors->first('diproses') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.diproses_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection