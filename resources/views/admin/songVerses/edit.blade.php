@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.songVerse.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.song-verses.update", [$songVerse->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title_id">{{ trans('cruds.songVerse.fields.title') }}</label>
                <select class="form-control select2 {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title_id" id="title_id">
                    @foreach($titles as $id => $title)
                        <option value="{{ $id }}" {{ (old('title_id') ? old('title_id') : $songVerse->title->id ?? '') == $id ? 'selected' : '' }}>{{ $title }}</option>
                    @endforeach
                </select>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songVerse.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="song_verse">{{ trans('cruds.songVerse.fields.song_verse') }}</label>
                <textarea class="form-control {{ $errors->has('song_verse') ? 'is-invalid' : '' }}" name="song_verse" id="song_verse">{{ old('song_verse', $songVerse->song_verse) }}</textarea>
                @if($errors->has('song_verse'))
                    <span class="text-danger">{{ $errors->first('song_verse') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songVerse.fields.song_verse_helper') }}</span>
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