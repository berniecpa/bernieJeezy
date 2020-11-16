<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Http\Resources\Admin\SongResource;
use App\Models\Song;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongResource(Song::all());
    }

    public function store(StoreSongRequest $request)
    {
        $song = Song::create($request->all());

        return (new SongResource($song))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Song $song)
    {
        abort_if(Gate::denies('song_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongResource($song);
    }

    public function update(UpdateSongRequest $request, Song $song)
    {
        $song->update($request->all());

        return (new SongResource($song))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Song $song)
    {
        abort_if(Gate::denies('song_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $song->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
