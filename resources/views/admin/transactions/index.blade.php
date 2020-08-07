@extends('layouts.admin')
@section('content')
<div class="content">
    @can('transaction_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.transactions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.transaction.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Transaction', 'route' => 'admin.transactions.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.transaction.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Transaction">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.no_order') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.id_partner') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.jenis_currency') }}
                                </th>
                                <th>
                                    {{ trans('cruds.currency.fields.nama') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.bank') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.currency_member') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.nilai_depo') }}
                                </th>
                                <th>
                                    {{ trans('cruds.currency.fields.jual') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.kurs_wd') }}
                                </th>
                                <th>
                                    {{ trans('cruds.currency.fields.jual') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.diskon') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.jumlahusd') }}
                                </th>
                                <th>
                                    {{ trans('cruds.currency.fields.max_trans') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.total') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.ket') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.transaction.fields.diproses') }}
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($currencies as $key => $item)
                                            <option value="{{ $item->jenis }}">{{ $item->jenis }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->email }}">{{ $item->email }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($currencies as $key => $item)
                                            <option value="{{ $item->beli }}">{{ $item->beli }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($currencies as $key => $item)
                                            <option value="{{ $item->beli }}">{{ $item->beli }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($currencies as $key => $item)
                                            <option value="{{ $item->diskon }}">{{ $item->diskon }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($currencies as $key => $item)
                                            <option value="{{ $item->min_trans }}">{{ $item->min_trans }}</option>
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
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\Transaction::STATUS_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($users as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
@can('transaction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transactions.massDestroy') }}",
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
    ajax: "{{ route('admin.transactions.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'no_order', name: 'no_order' },
{ data: 'id_partner_name', name: 'id_partner.name' },
{ data: 'jenis_currency_jenis', name: 'jenis_currency.jenis' },
{ data: 'jenis_currency.nama', name: 'jenis_currency.nama' },
{ data: 'bank_email', name: 'bank.email' },
{ data: 'currency_member_name', name: 'currency_member.name' },
{ data: 'nilai_depo_beli', name: 'nilai_depo.beli' },
{ data: 'nilai_depo.jual', name: 'nilai_depo.jual' },
{ data: 'kurs_wd_beli', name: 'kurs_wd.beli' },
{ data: 'kurs_wd.jual', name: 'kurs_wd.jual' },
{ data: 'diskon_diskon', name: 'diskon.diskon' },
{ data: 'jumlahusd_min_trans', name: 'jumlahusd.min_trans' },
{ data: 'jumlahusd.max_trans', name: 'jumlahusd.max_trans' },
{ data: 'total', name: 'total' },
{ data: 'ket', name: 'ket' },
{ data: 'status', name: 'status' },
{ data: 'diproses_name', name: 'diproses.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Transaction').DataTable(dtOverrideGlobals);
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