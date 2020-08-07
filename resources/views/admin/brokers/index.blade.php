@extends('layouts.admin')
@section('content')
<div class="content">
    @can('broker_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.brokers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.broker.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.broker.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Broker">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.judul_kat') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.judul_perusahaan') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.kantor_pusat') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.tahun_berdiri') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.badan_regulasi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.website') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.rebate_auto_manual') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.link_broker') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.kurs_depo') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.kurs_wd') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.stok') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.no_broker') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.nama_broker') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.status_transaksi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.min_transaksi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.max_transaksi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.img_broker') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.komisi_ib') }}
                                </th>
                                <th>
                                    {{ trans('cruds.broker.fields.komisi_pemilik') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\Broker::REBATE_AUTO_MANUAL_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\Broker::STATUS_TRANSAKSI_RADIO as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('broker_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.brokers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.brokers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'judul_kat', name: 'judul_kat' },
{ data: 'judul_perusahaan', name: 'judul_perusahaan' },
{ data: 'kantor_pusat', name: 'kantor_pusat' },
{ data: 'tahun_berdiri', name: 'tahun_berdiri' },
{ data: 'badan_regulasi', name: 'badan_regulasi' },
{ data: 'website', name: 'website' },
{ data: 'rebate_auto_manual', name: 'rebate_auto_manual' },
{ data: 'link_broker', name: 'link_broker' },
{ data: 'kurs_depo', name: 'kurs_depo' },
{ data: 'kurs_wd', name: 'kurs_wd' },
{ data: 'stok', name: 'stok' },
{ data: 'no_broker', name: 'no_broker' },
{ data: 'nama_broker', name: 'nama_broker' },
{ data: 'status_transaksi', name: 'status_transaksi' },
{ data: 'min_transaksi', name: 'min_transaksi' },
{ data: 'max_transaksi', name: 'max_transaksi' },
{ data: 'img_broker', name: 'img_broker', sortable: false, searchable: false },
{ data: 'komisi_ib', name: 'komisi_ib' },
{ data: 'komisi_pemilik', name: 'komisi_pemilik' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Broker').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
});

</script>
@endsection