<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSongWorkRequest;
use App\Http\Requests\UpdateSongWorkRequest;
use App\Http\Resources\Admin\SongWorkResource;
use App\Models\SongWork;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongWorksApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_work_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongWorkResource(SongWork::with(['song_title'])->get());
    }

    public function store(StoreSongWorkRequest $request)
    {
        $songWork = SongWork::create($request->all());

        return (new SongWorkResource($songWork))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SongWork $songWork)
    {
        abort_if(Gate::denies('song_work_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongWorkResource($songWork->load(['song_title']));
    }

    public function update(UpdateSongWorkRequest $request, SongWork $songWork)
    {
        $songWork->update($request->all());

        return (new SongWorkResource($songWork))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SongWork $songWork)
    {
        abort_if(Gate::denies('song_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songWork->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
