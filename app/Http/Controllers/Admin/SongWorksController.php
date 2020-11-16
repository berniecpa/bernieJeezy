<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySongWorkRequest;
use App\Http\Requests\StoreSongWorkRequest;
use App\Http\Requests\UpdateSongWorkRequest;
use App\Models\Song;
use App\Models\SongWork;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongWorksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_work_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songWorks = SongWork::all();

        return view('admin.songWorks.index', compact('songWorks'));
    }

    public function create()
    {
        abort_if(Gate::denies('song_work_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $song_titles = Song::all()->pluck('song_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.songWorks.create', compact('song_titles'));
    }

    public function store(StoreSongWorkRequest $request)
    {
        $songWork = SongWork::create($request->all());

        return redirect()->route('admin.song-works.index');
    }

    public function edit(SongWork $songWork)
    {
        abort_if(Gate::denies('song_work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $song_titles = Song::all()->pluck('song_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $songWork->load('song_title');

        return view('admin.songWorks.edit', compact('song_titles', 'songWork'));
    }

    public function update(UpdateSongWorkRequest $request, SongWork $songWork)
    {
        $songWork->update($request->all());

        return redirect()->route('admin.song-works.index');
    }

    public function show(SongWork $songWork)
    {
        abort_if(Gate::denies('song_work_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songWork->load('song_title');

        return view('admin.songWorks.show', compact('songWork'));
    }

    public function destroy(SongWork $songWork)
    {
        abort_if(Gate::denies('song_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songWork->delete();

        return back();
    }

    public function massDestroy(MassDestroySongWorkRequest $request)
    {
        SongWork::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
