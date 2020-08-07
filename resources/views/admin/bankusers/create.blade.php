@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.bankuser.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.bankusers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('id_partner') ? 'has-error' : '' }}">
                            <label class="required" for="id_partner_id">{{ trans('cruds.bankuser.fields.id_partner') }}</label>
                            <select class="form-control select2" name="id_partner_id" id="id_partner_id" required>
                                @foreach($id_partners as $id => $id_partner)
                                    <option value="{{ $id }}" {{ old('id_partner_id') == $id ? 'selected' : '' }}>{{ $id_partner }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_partner'))
                                <span class="help-block" role="alert">{{ $errors->first('id_partner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankuser.fields.id_partner_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama_id">{{ trans('cruds.bankuser.fields.nama') }}</label>
                            <select class="form-control select2" name="nama_id" id="nama_id" required>
                                @foreach($namas as $id => $nama)
                                    <option value="{{ $id }}" {{ old('nama_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankuser.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nomor_rekening') ? 'has-error' : '' }}">
                            <label class="required" for="nomor_rekening">{{ trans('cruds.bankuser.fields.nomor_rekening') }}</label>
                            <input class="form-control" type="text" name="nomor_rekening" id="nomor_rekening" value="{{ old('nomor_rekening', '') }}" required>
                            @if($errors->has('nomor_rekening'))
                                <span class="help-block" role="alert">{{ $errors->first('nomor_rekening') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankuser.fields.nomor_rekening_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('atas_nama') ? 'has-error' : '' }}">
                            <label class="required" for="atas_nama">{{ trans('cruds.bankuser.fields.atas_nama') }}</label>
                            <input class="form-control" type="text" name="atas_nama" id="atas_nama" value="{{ old('atas_nama', '') }}" required>
                            @if($errors->has('atas_nama'))
                                <span class="help-block" role="alert">{{ $errors->first('atas_nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankuser.fields.atas_nama_helper') }}</span>
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