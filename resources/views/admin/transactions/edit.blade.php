@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nilai_depo') ? 'has-error' : '' }}">
                            <label class="required" for="nilai_depo_id">{{ trans('cruds.transaction.fields.nilai_depo') }}</label>
                            <select class="form-control select2" name="nilai_depo_id" id="nilai_depo_id" required>
                                @foreach($nilai_depos as $id => $nilai_depo)
                                    <option value="{{ $id }}" {{ ($transaction->nilai_depo ? $transaction->nilai_depo->id : old('nilai_depo_id')) == $id ? 'selected' : '' }}>{{ $nilai_depo }}</option>
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
                                    <option value="{{ $id }}" {{ ($transaction->kurs_wd ? $transaction->kurs_wd->id : old('kurs_wd_id')) == $id ? 'selected' : '' }}>{{ $kurs_wd }}</option>
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
                                    <option value="{{ $id }}" {{ ($transaction->diskon ? $transaction->diskon->id : old('diskon_id')) == $id ? 'selected' : '' }}>{{ $diskon }}</option>
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
                                    <option value="{{ $id }}" {{ ($transaction->jumlahusd ? $transaction->jumlahusd->id : old('jumlahusd_id')) == $id ? 'selected' : '' }}>{{ $jumlahusd }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jumlahusd'))
                                <span class="help-block" role="alert">{{ $errors->first('jumlahusd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.jumlahusd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ket') ? 'has-error' : '' }}">
                            <label for="ket">{{ trans('cruds.transaction.fields.ket') }}</label>
                            <input class="form-control" type="text" name="ket" id="ket" value="{{ old('ket', $transaction->ket) }}">
                            @if($errors->has('ket'))
                                <span class="help-block" role="alert">{{ $errors->first('ket') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.ket_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transaction.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transaction::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $transaction->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                                    <option value="{{ $id }}" {{ ($transaction->diproses ? $transaction->diproses->id : old('diproses_id')) == $id ? 'selected' : '' }}>{{ $diproses }}</option>
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