@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.songSummary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.song-summaries.update", [$songSummary->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="song_title_id">{{ trans('cruds.songSummary.fields.song_title') }}</label>
                <select class="form-control select2 {{ $errors->has('song_title') ? 'is-invalid' : '' }}" name="song_title_id" id="song_title_id">
                    @foreach($song_titles as $id => $song_title)
                        <option value="{{ $id }}" {{ (old('song_title_id') ? old('song_title_id') : $songSummary->song_title->id ?? '') == $id ? 'selected' : '' }}>{{ $song_title }}</option>
                    @endforeach
                </select>
                @if($errors->has('song_title'))
                    <span class="text-danger">{{ $errors->first('song_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songSummary.fields.song_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="song_summary">{{ trans('cruds.songSummary.fields.song_summary') }}</label>
                <textarea class="form-control {{ $errors->has('song_summary') ? 'is-invalid' : '' }}" name="song_summary" id="song_summary">{{ old('song_summary', $songSummary->song_summary) }}</textarea>
                @if($errors->has('song_summary'))
                    <span class="text-danger">{{ $errors->first('song_summary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.songSummary.fields.song_summary_helper') }}</span>
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