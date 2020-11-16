@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.songVerse.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.song-verses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.songVerse.fields.id') }}
                        </th>
                        <td>
                            {{ $songVerse->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songVerse.fields.title') }}
                        </th>
                        <td>
                            {{ $songVerse->title->song_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.songVerse.fields.song_verse') }}
                        </th>
                        <td>
                            {{ $songVerse->song_verse }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.song-verses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection