@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.songWork.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.song-works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.songWork.fields.id') }}
                        </th>
                        <td>
                            {{ $songWork->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songWork.fields.song_title') }}
                        </th>
                        <td>
                            {{ $songWork->song_title->song_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songWork.fields.keyword') }}
                        </th>
                        <td>
                            {{ $songWork->keyword }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songWork.fields.rhyming_keywords') }}
                        </th>
                        <td>
                            {{ $songWork->rhyming_keywords }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.song-works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection