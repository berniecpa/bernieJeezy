@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.songHook.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.song-hooks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title_id">{{ trans('cruds.songHook.fields.title') }}</label>
                <select class="form-control select2 {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title_id" id="title_id">
                    @foreach($titles as $id => $title)
                        <option value="{{ $id }}" {{ old('title_id') == $id ? 'selected' : '' }}>{{ $title }}</option>
                    @endforeach
                </select>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songHook.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="song_hook">{{ trans('cruds.songHook.fields.song_hook') }}</label>
                <textarea class="form-control {{ $errors->has('song_hook') ? 'is-invalid' : '' }}" name="song_hook" id="song_hook">{{ old('song_hook') }}</textarea>
                @if($errors->has('song_hook'))
                    <span class="text-danger">{{ $errors->first('song_hook') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songHook.fields.song_hook_helper') }}</span>
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