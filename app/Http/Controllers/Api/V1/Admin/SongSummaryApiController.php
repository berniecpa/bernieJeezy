<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSongSummaryRequest;
use App\Http\Requests\UpdateSongSummaryRequest;
use App\Http\Resources\Admin\SongSummaryResource;
use App\Models\SongSummary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongSummaryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_summary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongSummaryResource(SongSummary::with(['song_title'])->get());
    }

    public function store(StoreSongSummaryRequest $request)
    {
        $songSummary = SongSummary::create($request->all());

        return (new SongSummaryResource($songSummary))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SongSummary $songSummary)
    {
        abort_if(Gate::denies('song_summary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongSummaryResource($songSummary->load(['song_title']));
    }

    public function update(UpdateSongSummaryRequest $request, SongSummary $songSummary)
    {
        $songSummary->update($request->all());

        return (new SongSummaryResource($songSummary))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SongSummary $songSummary)
    {
        abort_if(Gate::denies('song_summary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songSummary->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
