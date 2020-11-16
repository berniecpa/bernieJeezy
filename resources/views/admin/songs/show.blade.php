@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.song.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.songs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.song.fields.id') }}
                        </th>
                        <td>
                            {{ $song->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.song.fields.song_title') }}
                        </th>
                        <td>
                            {{ $song->song_title }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.songs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#song_title_song_summaries" role="tab" data-toggle="tab">
                {{ trans('cruds.songSummary.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#song_title_song_works" role="tab" data-toggle="tab">
                {{ trans('cruds.songWork.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#title_song_hooks" role="tab" data-toggle="tab">
                {{ trans('cruds.songHook.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#title_song_verses" role="tab" data-toggle="tab">
                {{ trans('cruds.songVerse.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="song_title_song_summaries">
            @includeIf('admin.songs.relationships.songTitleSongSummaries', ['songSummaries' => $song->songTitleSongSummaries])
        </div>
        <div class="tab-pane" role="tabpanel" id="song_title_song_works">
            @includeIf('admin.songs.relationships.songTitleSongWorks', ['songWorks' => $song->songTitleSongWorks])
        </div>
        <div class="tab-pane" role="tabpanel" id="title_song_hooks">
            @includeIf('admin.songs.relationships.titleSongHooks', ['songHooks' => $song->titleSongHooks])
        </div>
        <div class="tab-pane" role="tabpanel" id="title_song_verses">
            @includeIf('admin.songs.relationships.titleSongVerses', ['songVerses' => $song->titleSongVerses])
        </div>
    </div>
</div>

@endsection