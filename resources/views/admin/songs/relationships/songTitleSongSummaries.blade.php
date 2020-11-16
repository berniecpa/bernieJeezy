<div class="m-3">
    @can('song_summary_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.song-summaries.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.songSummary.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.songSummary.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-songTitleSongSummaries">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.songSummary.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.songSummary.fields.song_title') }}
                            </th>
                            <th>
                                {{ trans('cruds.songSummary.fields.song_summary') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($songSummaries as $key => $songSummary)
                            <tr data-entry-id="{{ $songSummary->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $songSummary->id ?? '' }}
                                </td>
                                <td>
                                    {{ $songSummary->song_title->song_title ?? '' }}
                                </td>
                                <td>
                                    {{ $songSummary->song_summary ?? '' }}
                                </td>
                                <td>
                                    @can('song_summary_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.song-summaries.show', $songSummary->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('song_summary_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.song-summaries.edit', $songSummary->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('song_summary_delete')
                                        <form action="{{ route('admin.song-summaries.destroy', $songSummary->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('song_summary_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.song-summaries.massDestroy') }}",
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
  let table = $('.datatable-songTitleSongSummaries:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection