@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.songSummary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.song-summaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.songSummary.fields.id') }}
                        </th>
                        <td>
                            {{ $songSummary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songSummary.fields.song_title') }}
                        </th>
                        <td>
                            {{ $songSummary->song_title->song_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songSummary.fields.song_summary') }}
                        </th>
                        <td>
                            {{ $songSummary->song_summary }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.song-summaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection