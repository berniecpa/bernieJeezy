@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.song.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.songs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="song_title">{{ trans('cruds.song.fields.song_title') }}</label>
                <input class="form-control {{ $errors->has('song_title') ? 'is-invalid' : '' }}" type="text" name="song_title" id="song_title" value="{{ old('song_title', '') }}">
                @if($errors->has('song_title'))
                    <span class="text-danger">{{ $errors->first('song_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.song.fields.song_title_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection