@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.broker.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.brokers.update", [$broker->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('judul_kat') ? 'has-error' : '' }}">
                            <label class="required" for="judul_kat">{{ trans('cruds.broker.fields.judul_kat') }}</label>
                            <input class="form-control" type="text" name="judul_kat" id="judul_kat" value="{{ old('judul_kat', $broker->judul_kat) }}" required>
                            @if($errors->has('judul_kat'))
                                <span class="help-block" role="alert">{{ $errors->first('judul_kat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.judul_kat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('judul_perusahaan') ? 'has-error' : '' }}">
                            <label class="required" for="judul_perusahaan">{{ trans('cruds.broker.fields.judul_perusahaan') }}</label>
                            <input class="form-control" type="text" name="judul_perusahaan" id="judul_perusahaan" value="{{ old('judul_perusahaan', $broker->judul_perusahaan) }}" required>
                            @if($errors->has('judul_perusahaan'))
                                <span class="help-block" role="alert">{{ $errors->first('judul_perusahaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.judul_perusahaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kantor_pusat') ? 'has-error' : '' }}">
                            <label for="kantor_pusat">{{ trans('cruds.broker.fields.kantor_pusat') }}</label>
                            <input class="form-control" type="text" name="kantor_pusat" id="kantor_pusat" value="{{ old('kantor_pusat', $broker->kantor_pusat) }}">
                            @if($errors->has('kantor_pusat'))
                                <span class="help-block" role="alert">{{ $errors->first('kantor_pusat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.kantor_pusat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tahun_berdiri') ? 'has-error' : '' }}">
                            <label for="tahun_berdiri">{{ trans('cruds.broker.fields.tahun_berdiri') }}</label>
                            <input class="form-control" type="text" name="tahun_berdiri" id="tahun_berdiri" value="{{ old('tahun_berdiri', $broker->tahun_berdiri) }}">
                            @if($errors->has('tahun_berdiri'))
                                <span class="help-block" role="alert">{{ $errors->first('tahun_berdiri') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.tahun_berdiri_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('badan_regulasi') ? 'has-error' : '' }}">
                            <label for="badan_regulasi">{{ trans('cruds.broker.fields.badan_regulasi') }}</label>
                            <input class="form-control" type="text" name="badan_regulasi" id="badan_regulasi" value="{{ old('badan_regulasi', $broker->badan_regulasi) }}">
                            @if($errors->has('badan_regulasi'))
                                <span class="help-block" role="alert">{{ $errors->first('badan_regulasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.badan_regulasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                            <label for="website">{{ trans('cruds.broker.fields.website') }}</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', $broker->website) }}">
                            @if($errors->has('website'))
                                <span class="help-block" role="alert">{{ $errors->first('website') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.website_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('profil') ? 'has-error' : '' }}">
                            <label for="profil">{{ trans('cruds.broker.fields.profil') }}</label>
                            <textarea class="form-control ckeditor" name="profil" id="profil">{!! old('profil', $broker->profil) !!}</textarea>
                            @if($errors->has('profil'))
                                <span class="help-block" role="alert">{{ $errors->first('profil') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.profil_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_akun') ? 'has-error' : '' }}">
                            <label for="jenis_akun">{{ trans('cruds.broker.fields.jenis_akun') }}</label>
                            <textarea class="form-control ckeditor" name="jenis_akun" id="jenis_akun">{!! old('jenis_akun', $broker->jenis_akun) !!}</textarea>
                            @if($errors->has('jenis_akun'))
                                <span class="help-block" role="alert">{{ $errors->first('jenis_akun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.jenis_akun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('deskripsi_tambahan') ? 'has-error' : '' }}">
                            <label for="deskripsi_tambahan">{{ trans('cruds.broker.fields.deskripsi_tambahan') }}</label>
                            <textarea class="form-control ckeditor" name="deskripsi_tambahan" id="deskripsi_tambahan">{!! old('deskripsi_tambahan', $broker->deskripsi_tambahan) !!}</textarea>
                            @if($errors->has('deskripsi_tambahan'))
                                <span class="help-block" role="alert">{{ $errors->first('deskripsi_tambahan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.deskripsi_tambahan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kondisi_trading') ? 'has-error' : '' }}">
                            <label for="kondisi_trading">{{ trans('cruds.broker.fields.kondisi_trading') }}</label>
                            <textarea class="form-control ckeditor" name="kondisi_trading" id="kondisi_trading">{!! old('kondisi_trading', $broker->kondisi_trading) !!}</textarea>
                            @if($errors->has('kondisi_trading'))
                                <span class="help-block" role="alert">{{ $errors->first('kondisi_trading') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.kondisi_trading_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ket_broker') ? 'has-error' : '' }}">
                            <label for="ket_broker">{{ trans('cruds.broker.fields.ket_broker') }}</label>
                            <textarea class="form-control ckeditor" name="ket_broker" id="ket_broker">{!! old('ket_broker', $broker->ket_broker) !!}</textarea>
                            @if($errors->has('ket_broker'))
                                <span class="help-block" role="alert">{{ $errors->first('ket_broker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.ket_broker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rebate_auto_manual') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.broker.fields.rebate_auto_manual') }}</label>
                            <select class="form-control" name="rebate_auto_manual" id="rebate_auto_manual">
                                <option value disabled {{ old('rebate_auto_manual', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Broker::REBATE_AUTO_MANUAL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('rebate_auto_manual', $broker->rebate_auto_manual) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('rebate_auto_manual'))
                                <span class="help-block" role="alert">{{ $errors->first('rebate_auto_manual') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.rebate_auto_manual_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('link_broker') ? 'has-error' : '' }}">
                            <label for="link_broker">{{ trans('cruds.broker.fields.link_broker') }}</label>
                            <input class="form-control" type="text" name="link_broker" id="link_broker" value="{{ old('link_broker', $broker->link_broker) }}">
                            @if($errors->has('link_broker'))
                                <span class="help-block" role="alert">{{ $errors->first('link_broker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.link_broker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kurs_depo') ? 'has-error' : '' }}">
                            <label for="kurs_depo">{{ trans('cruds.broker.fields.kurs_depo') }}</label>
                            <input class="form-control" type="number" name="kurs_depo" id="kurs_depo" value="{{ old('kurs_depo', $broker->kurs_depo) }}" step="0.01">
                            @if($errors->has('kurs_depo'))
                                <span class="help-block" role="alert">{{ $errors->first('kurs_depo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.kurs_depo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kurs_wd') ? 'has-error' : '' }}">
                            <label for="kurs_wd">{{ trans('cruds.broker.fields.kurs_wd') }}</label>
                            <input class="form-control" type="number" name="kurs_wd" id="kurs_wd" value="{{ old('kurs_wd', $broker->kurs_wd) }}" step="0.01">
                            @if($errors->has('kurs_wd'))
                                <span class="help-block" role="alert">{{ $errors->first('kurs_wd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.kurs_wd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stok') ? 'has-error' : '' }}">
                            <label class="required" for="stok">{{ trans('cruds.broker.fields.stok') }}</label>
                            <input class="form-control" type="text" name="stok" id="stok" value="{{ old('stok', $broker->stok) }}" required>
                            @if($errors->has('stok'))
                                <span class="help-block" role="alert">{{ $errors->first('stok') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.stok_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_broker') ? 'has-error' : '' }}">
                            <label class="required" for="no_broker">{{ trans('cruds.broker.fields.no_broker') }}</label>
                            <input class="form-control" type="text" name="no_broker" id="no_broker" value="{{ old('no_broker', $broker->no_broker) }}" required>
                            @if($errors->has('no_broker'))
                                <span class="help-block" role="alert">{{ $errors->first('no_broker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.no_broker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_broker') ? 'has-error' : '' }}">
                            <label for="nama_broker">{{ trans('cruds.broker.fields.nama_broker') }}</label>
                            <input class="form-control" type="text" name="nama_broker" id="nama_broker" value="{{ old('nama_broker', $broker->nama_broker) }}">
                            @if($errors->has('nama_broker'))
                                <span class="help-block" role="alert">{{ $errors->first('nama_broker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.nama_broker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status_transaksi') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.broker.fields.status_transaksi') }}</label>
                            @foreach(App\Models\Broker::STATUS_TRANSAKSI_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="status_transaksi_{{ $key }}" name="status_transaksi" value="{{ $key }}" {{ old('status_transaksi', $broker->status_transaksi) === (string) $key ? 'checked' : '' }} required>
                                    <label for="status_transaksi_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('status_transaksi'))
                                <span class="help-block" role="alert">{{ $errors->first('status_transaksi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.status_transaksi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('min_transaksi') ? 'has-error' : '' }}">
                            <label class="required" for="min_transaksi">{{ trans('cruds.broker.fields.min_transaksi') }}</label>
                            <input class="form-control" type="number" name="min_transaksi" id="min_transaksi" value="{{ old('min_transaksi', $broker->min_transaksi) }}" step="1" required>
                            @if($errors->has('min_transaksi'))
                                <span class="help-block" role="alert">{{ $errors->first('min_transaksi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.min_transaksi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('max_transaksi') ? 'has-error' : '' }}">
                            <label class="required" for="max_transaksi">{{ trans('cruds.broker.fields.max_transaksi') }}</label>
                            <input class="form-control" type="text" name="max_transaksi" id="max_transaksi" value="{{ old('max_transaksi', $broker->max_transaksi) }}" required>
                            @if($errors->has('max_transaksi'))
                                <span class="help-block" role="alert">{{ $errors->first('max_transaksi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.max_transaksi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('img_broker') ? 'has-error' : '' }}">
                            <label for="img_broker">{{ trans('cruds.broker.fields.img_broker') }}</label>
                            <div class="needsclick dropzone" id="img_broker-dropzone">
                            </div>
                            @if($errors->has('img_broker'))
                                <span class="help-block" role="alert">{{ $errors->first('img_broker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.img_broker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('komisi_ib') ? 'has-error' : '' }}">
                            <label for="komisi_ib">{{ trans('cruds.broker.fields.komisi_ib') }}</label>
                            <input class="form-control" type="text" name="komisi_ib" id="komisi_ib" value="{{ old('komisi_ib', $broker->komisi_ib) }}">
                            @if($errors->has('komisi_ib'))
                                <span class="help-block" role="alert">{{ $errors->first('komisi_ib') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.komisi_ib_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('komisi_pemilik') ? 'has-error' : '' }}">
                            <label for="komisi_pemilik">{{ trans('cruds.broker.fields.komisi_pemilik') }}</label>
                            <input class="form-control" type="text" name="komisi_pemilik" id="komisi_pemilik" value="{{ old('komisi_pemilik', $broker->komisi_pemilik) }}">
                            @if($errors->has('komisi_pemilik'))
                                <span class="help-block" role="alert">{{ $errors->first('komisi_pemilik') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.broker.fields.komisi_pemilik_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/brokers/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $broker->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.imgBrokerDropzone = {
    url: '{{ route('admin.brokers.storeMedia') }}',
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
      $('form').find('input[name="img_broker"]').remove()
      $('form').append('<input type="hidden" name="img_broker" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="img_broker"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($broker) && $broker->img_broker)
      var file = {!! json_encode($broker->img_broker) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="img_broker" value="' + file.file_name + '">')
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