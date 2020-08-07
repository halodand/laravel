<div class="content">
    @can('transaction_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.transactions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.transaction.title_singular') }}
                </a>
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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-diskonTransactions">
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
                            </thead>
                            <tbody>
                                @foreach($transactions as $key => $transaction)
                                    <tr data-entry-id="{{ $transaction->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $transaction->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->no_order ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->id_partner->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->jenis_currency->jenis ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->jenis_currency->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->bank->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->currency_member->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->nilai_depo->beli ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->nilai_depo->jual ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->kurs_wd->beli ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->kurs_wd->jual ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->diskon->diskon ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->jumlahusd->min_trans ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->jumlahusd->max_trans ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->total ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->ket ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Transaction::STATUS_SELECT[$transaction->status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transaction->diproses->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('transaction_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.transactions.show', $transaction->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('transaction_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.transactions.edit', $transaction->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('transaction_delete')
                                                <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transaction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transactions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-diskonTransactions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection