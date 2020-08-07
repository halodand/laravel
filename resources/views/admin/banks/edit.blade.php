@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.bank.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.banks.update", [$bank->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.bank.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $bank->nama) }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nomor_rekening') ? 'has-error' : '' }}">
                            <label class="required" for="nomor_rekening">{{ trans('cruds.bank.fields.nomor_rekening') }}</label>
                            <input class="form-control" type="text" name="nomor_rekening" id="nomor_rekening" value="{{ old('nomor_rekening', $bank->nomor_rekening) }}" required>
                            @if($errors->has('nomor_rekening'))
                                <span class="help-block" role="alert">{{ $errors->first('nomor_rekening') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.nomor_rekening_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('atasnama') ? 'has-error' : '' }}">
                            <label class="required" for="atasnama">{{ trans('cruds.bank.fields.atasnama') }}</label>
                            <input class="form-control" type="text" name="atasnama" id="atasnama" value="{{ old('atasnama', $bank->atasnama) }}" required>
                            @if($errors->has('atasnama'))
                                <span class="help-block" role="alert">{{ $errors->first('atasnama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.atasnama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.bank.fields.status') }}</label>
                            @foreach(App\Models\Bank::STATUS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $bank->status) === (string) $key ? 'checked' : '' }}>
                                    <label for="status_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.status_helper') }}</span>
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