<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySongSummaryRequest;
use App\Http\Requests\StoreSongSummaryRequest;
use App\Http\Requests\UpdateSongSummaryRequest;
use App\Models\Song;
use App\Models\SongSummary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongSummaryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_summary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songSummaries = SongSummary::all();

        return view('admin.songSummaries.index', compact('songSummaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('song_summary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $song_titles = Song::all()->pluck('song_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.songSummaries.create', compact('song_titles'));
    }

    public function store(StoreSongSummaryRequest $request)
    {
        $songSummary = SongSummary::create($request->all());

        return redirect()->route('admin.song-summaries.index');
    }

    public function edit(SongSummary $songSummary)
    {
        abort_if(Gate::denies('song_summary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $song_titles = Song::all()->pluck('song_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $songSummary->load('song_title');

        return view('admin.songSummaries.edit', compact('song_titles', 'songSummary'));
    }

    public function update(UpdateSongSummaryRequest $request, SongSummary $songSummary)
    {
        $songSummary->update($request->all());

        return redirect()->route('admin.song-summaries.index');
    }

    public function show(SongSummary $songSummary)
    {
        abort_if(Gate::denies('song_summary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songSummary->load('song_title');

        return view('admin.songSummaries.show', compact('songSummary'));
    }

    public function destroy(SongSummary $songSummary)
    {
        abort_if(Gate::denies('song_summary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songSummary->delete();

        return back();
    }

    public function massDestroy(MassDestroySongSummaryRequest $request)
    {
        SongSummary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
