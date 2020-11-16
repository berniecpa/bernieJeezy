@extends('layouts.admin')
@section('content')
@can('song_verse_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.song-verses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.songVerse.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.songVerse.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SongVerse">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.songVerse.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.songVerse.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.songVerse.fields.song_verse') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($songVerses as $key => $songVerse)
                        <tr data-entry-id="{{ $songVerse->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $songVerse->id ?? '' }}
                            </td>
                            <td>
                                {{ $songVerse->title->song_title ?? '' }}
                            </td>
                            <td>
                                {{ $songVerse->song_verse ?? '' }}
                            </td>
                            <td>
                                @can('song_verse_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.song-verses.show', $songVerse->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('song_verse_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.song-verses.edit', $songVerse->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('song_verse_delete')
                                    <form action="{{ route('admin.song-verses.destroy', $songVerse->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('song_verse_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.song-verses.massDestroy') }}",
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
  let table = $('.datatable-SongVerse:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection