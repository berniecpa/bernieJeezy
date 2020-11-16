<div class="m-3">
    @can('song_hook_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.song-hooks.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.songHook.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.songHook.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-titleSongHooks">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.songHook.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.songHook.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.songHook.fields.song_hook') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($songHooks as $key => $songHook)
                            <tr data-entry-id="{{ $songHook->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $songHook->id ?? '' }}
                                </td>
                                <td>
                                    {{ $songHook->title->song_title ?? '' }}
                                </td>
                                <td>
                                    {{ $songHook->song_hook ?? '' }}
                                </td>
                                <td>
                                    @can('song_hook_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.song-hooks.show', $songHook->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('song_hook_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.song-hooks.edit', $songHook->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('song_hook_delete')
                                        <form action="{{ route('admin.song-hooks.destroy', $songHook->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('song_hook_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.song-hooks.massDestroy') }}",
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
  let table = $('.datatable-titleSongHooks:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection