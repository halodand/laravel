@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.currency.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.currencies.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.currency.fields.jenis') }}</label>
                            @foreach(App\Models\Currency::JENIS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="jenis_{{ $key }}" name="jenis" value="{{ $key }}" {{ old('jenis', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="jenis_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('jenis'))
                                <span class="help-block" role="alert">{{ $errors->first('jenis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.jenis_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('img_page') ? 'has-error' : '' }}">
                            <label class="required" for="img_page">{{ trans('cruds.currency.fields.img_page') }}</label>
                            <div class="needsclick dropzone" id="img_page-dropzone">
                            </div>
                            @if($errors->has('img_page'))
                                <span class="help-block" role="alert">{{ $errors->first('img_page') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.img_page_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.currency.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jual') ? 'has-error' : '' }}">
                            <label class="required" for="jual">{{ trans('cruds.currency.fields.jual') }}</label>
                            <input class="form-control" type="number" name="jual" id="jual" value="{{ old('jual', '') }}" step="0.01" required>
                            @if($errors->has('jual'))
                                <span class="help-block" role="alert">{{ $errors->first('jual') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.jual_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('beli') ? 'has-error' : '' }}">
                            <label class="required" for="beli">{{ trans('cruds.currency.fields.beli') }}</label>
                            <input class="form-control" type="number" name="beli" id="beli" value="{{ old('beli', '') }}" step="0.01" required>
                            @if($errors->has('beli'))
                                <span class="help-block" role="alert">{{ $errors->first('beli') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.beli_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('diskon') ? 'has-error' : '' }}">
                            <label for="diskon">{{ trans('cruds.currency.fields.diskon') }}</label>
                            <input class="form-control" type="number" name="diskon" id="diskon" value="{{ old('diskon', '') }}" step="0.01">
                            @if($errors->has('diskon'))
                                <span class="help-block" role="alert">{{ $errors->first('diskon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.diskon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_currency') ? 'has-error' : '' }}">
                            <label for="no_currency">{{ trans('cruds.currency.fields.no_currency') }}</label>
                            <input class="form-control" type="text" name="no_currency" id="no_currency" value="{{ old('no_currency', '') }}">
                            @if($errors->has('no_currency'))
                                <span class="help-block" role="alert">{{ $errors->first('no_currency') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.no_currency_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_currency') ? 'has-error' : '' }}">
                            <label for="nama_currency">{{ trans('cruds.currency.fields.nama_currency') }}</label>
                            <input class="form-control" type="text" name="nama_currency" id="nama_currency" value="{{ old('nama_currency', '') }}">
                            @if($errors->has('nama_currency'))
                                <span class="help-block" role="alert">{{ $errors->first('nama_currency') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.nama_currency_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('min_trans') ? 'has-error' : '' }}">
                            <label for="min_trans">{{ trans('cruds.currency.fields.min_trans') }}</label>
                            <input class="form-control" type="number" name="min_trans" id="min_trans" value="{{ old('min_trans', '') }}" step="1">
                            @if($errors->has('min_trans'))
                                <span class="help-block" role="alert">{{ $errors->first('min_trans') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.min_trans_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('max_trans') ? 'has-error' : '' }}">
                            <label for="max_trans">{{ trans('cruds.currency.fields.max_trans') }}</label>
                            <input class="form-control" type="number" name="max_trans" id="max_trans" value="{{ old('max_trans', '') }}" step="1">
                            @if($errors->has('max_trans'))
                                <span class="help-block" role="alert">{{ $errors->first('max_trans') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.max_trans_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.currency.fields.status') }}</label>
                            @foreach(App\Models\Currency::STATUS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="status_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.status_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imgPageDropzone = {
    url: '{{ route('admin.currencies.storeMedia') }}',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="img_page"]').remove()
      $('form').append('<input type="hidden" name="img_page" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="img_page"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($currency) && $currency->img_page)
      var file = {!! json_encode($currency->img_page) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="img_page" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection