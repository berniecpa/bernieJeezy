<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySongRequest;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Song;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songs = Song::all();

        return view('admin.songs.index', compact('songs'));
    }

    public function create()
    {
        abort_if(Gate::denies('song_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.songs.create');
    }

    public function store(StoreSongRequest $request)
    {
        $song = Song::create($request->all());

        return redirect()->route('admin.songs.index');
    }

    public function edit(Song $song)
    {
        abort_if(Gate::denies('song_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.songs.edit', compact('song'));
    }

    public function update(UpdateSongRequest $request, Song $song)
    {
        $song->update($request->all());

        return redirect()->route('admin.songs.index');
    }

    public function show(Song $song)
    {
        abort_if(Gate::denies('song_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $song->load('songTitleSongSummaries', 'songTitleSongWorks', 'titleSongHooks', 'titleSongVerses');

        return view('admin.songs.show', compact('song'));
    }

    public function destroy(Song $song)
    {
        abort_if(Gate::denies('song_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $song->delete();

        return back();
    }

    public function massDestroy(MassDestroySongRequest $request)
    {
        Song::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
