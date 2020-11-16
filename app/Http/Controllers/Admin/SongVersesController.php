<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySongVerseRequest;
use App\Http\Requests\StoreSongVerseRequest;
use App\Http\Requests\UpdateSongVerseRequest;
use App\Models\Song;
use App\Models\SongVerse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongVersesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_verse_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songVerses = SongVerse::all();

        return view('admin.songVerses.index', compact('songVerses'));
    }

    public function create()
    {
        abort_if(Gate::denies('song_verse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Song::all()->pluck('song_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.songVerses.create', compact('titles'));
    }

    public function store(StoreSongVerseRequest $request)
    {
        $songVerse = SongVerse::create($request->all());

        return redirect()->route('admin.song-verses.index');
    }

    public function edit(SongVerse $songVerse)
    {
        abort_if(Gate::denies('song_verse_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Song::all()->pluck('song_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $songVerse->load('title');

        return view('admin.songVerses.edit', compact('titles', 'songVerse'));
    }

    public function update(UpdateSongVerseRequest $request, SongVerse $songVerse)
    {
        $songVerse->update($request->all());

        return redirect()->route('admin.song-verses.index');
    }

    public function show(SongVerse $songVerse)
    {
        abort_if(Gate::denies('song_verse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songVerse->load('title');

        return view('admin.songVerses.show', compact('songVerse'));
    }

    public function destroy(SongVerse $songVerse)
    {
        abort_if(Gate::denies('song_verse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songVerse->delete();

        return back();
    }

    public function massDestroy(MassDestroySongVerseRequest $request)
    {
        SongVerse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
