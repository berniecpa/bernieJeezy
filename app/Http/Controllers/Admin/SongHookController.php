<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySongHookRequest;
use App\Http\Requests\StoreSongHookRequest;
use App\Http\Requests\UpdateSongHookRequest;
use App\Models\Song;
use App\Models\SongHook;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongHookController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_hook_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songHooks = SongHook::all();

        return view('admin.songHooks.index', compact('songHooks'));
    }

    public function create()
    {
        abort_if(Gate::denies('song_hook_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Song::all()->pluck('song_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.songHooks.create', compact('titles'));
    }

    public function store(StoreSongHookRequest $request)
    {
        $songHook = SongHook::create($request->all());

        return redirect()->route('admin.song-hooks.index');
    }

    public function edit(SongHook $songHook)
    {
        abort_if(Gate::denies('song_hook_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Song::all()->pluck('song_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $songHook->load('title');

        return view('admin.songHooks.edit', compact('titles', 'songHook'));
    }

    public function update(UpdateSongHookRequest $request, SongHook $songHook)
    {
        $songHook->update($request->all());

        return redirect()->route('admin.song-hooks.index');
    }

    public function show(SongHook $songHook)
    {
        abort_if(Gate::denies('song_hook_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songHook->load('title');

        return view('admin.songHooks.show', compact('songHook'));
    }

    public function destroy(SongHook $songHook)
    {
        abort_if(Gate::denies('song_hook_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songHook->delete();

        return back();
    }

    public function massDestroy(MassDestroySongHookRequest $request)
    {
        SongHook::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
