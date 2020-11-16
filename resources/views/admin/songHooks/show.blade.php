@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.songHook.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.song-hooks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.songHook.fields.id') }}
                        </th>
                        <td>
                            {{ $songHook->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songHook.fields.title') }}
                        </th>
                        <td>
                            {{ $songHook->title->song_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songHook.fields.song_hook') }}
                        </th>
                        <td>
                            {{ $songHook->song_hook }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.song-hooks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection