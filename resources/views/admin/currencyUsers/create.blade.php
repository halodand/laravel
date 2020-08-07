@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.currencyUser.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.currency-users.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('id_partner') ? 'has-error' : '' }}">
                            <label class="required" for="id_partner_id">{{ trans('cruds.currencyUser.fields.id_partner') }}</label>
                            <select class="form-control select2" name="id_partner_id" id="id_partner_id" required>
                                @foreach($id_partners as $id => $id_partner)
                                    <option value="{{ $id }}" {{ old('id_partner_id') == $id ? 'selected' : '' }}>{{ $id_partner }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_partner'))
                                <span class="help-block" role="alert">{{ $errors->first('id_partner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currencyUser.fields.id_partner_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama_id">{{ trans('cruds.currencyUser.fields.nama') }}</label>
                            <select class="form-control select2" name="nama_id" id="nama_id" required>
                                @foreach($namas as $id => $nama)
                                    <option value="{{ $id }}" {{ old('nama_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currencyUser.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_account') ? 'has-error' : '' }}">
                            <label class="required" for="no_account">{{ trans('cruds.currencyUser.fields.no_account') }}</label>
                            <input class="form-control" type="text" name="no_account" id="no_account" value="{{ old('no_account', '') }}" required>
                            @if($errors->has('no_account'))
                                <span class="help-block" role="alert">{{ $errors->first('no_account') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currencyUser.fields.no_account_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_account') ? 'has-error' : '' }}">
                            <label for="nama_account_id">{{ trans('cruds.currencyUser.fields.nama_account') }}</label>
                            <select class="form-control select2" name="nama_account_id" id="nama_account_id">
                                @foreach($nama_accounts as $id => $nama_account)
                                    <option value="{{ $id }}" {{ old('nama_account_id') == $id ? 'selected' : '' }}>{{ $nama_account }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nama_account'))
                                <span class="help-block" role="alert">{{ $errors->first('nama_account') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currencyUser.fields.nama_account_helper') }}</span>
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