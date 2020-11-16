@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.songWork.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.song-works.update", [$songWork->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="song_title_id">{{ trans('cruds.songWork.fields.song_title') }}</label>
                <select class="form-control select2 {{ $errors->has('song_title') ? 'is-invalid' : '' }}" name="song_title_id" id="song_title_id">
                    @foreach($song_titles as $id => $song_title)
                        <option value="{{ $id }}" {{ (old('song_title_id') ? old('song_title_id') : $songWork->song_title->id ?? '') == $id ? 'selected' : '' }}>{{ $song_title }}</option>
                    @endforeach
                </select>
                @if($errors->has('song_title'))
                    <span class="text-danger">{{ $errors->first('song_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songWork.fields.song_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keyword">{{ trans('cruds.songWork.fields.keyword') }}</label>
                <input class="form-control {{ $errors->has('keyword') ? 'is-invalid' : '' }}" type="text" name="keyword" id="keyword" value="{{ old('keyword', $songWork->keyword) }}">
                @if($errors->has('keyword'))
                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songWork.fields.keyword_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rhyming_keywords">{{ trans('cruds.songWork.fields.rhyming_keywords') }}</label>
                <textarea class="form-control {{ $errors->has('rhyming_keywords') ? 'is-invalid' : '' }}" name="rhyming_keywords" id="rhyming_keywords">{{ old('rhyming_keywords', $songWork->rhyming_keywords) }}</textarea>
                @if($errors->has('rhyming_keywords'))
                    <span class="text-danger">{{ $errors->first('rhyming_keywords') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songWork.fields.rhyming_keywords_helper') }}</span>
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