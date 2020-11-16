<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSongVerseRequest;
use App\Http\Requests\UpdateSongVerseRequest;
use App\Http\Resources\Admin\SongVerseResource;
use App\Models\SongVerse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongVersesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_verse_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongVerseResource(SongVerse::with(['title'])->get());
    }

    public function store(StoreSongVerseRequest $request)
    {
        $songVerse = SongVerse::create($request->all());

        return (new SongVerseResource($songVerse))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SongVerse $songVerse)
    {
        abort_if(Gate::denies('song_verse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongVerseResource($songVerse->load(['title']));
    }

    public function update(UpdateSongVerseRequest $request, SongVerse $songVerse)
    {
        $songVerse->update($request->all());

        return (new SongVerseResource($songVerse))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SongVerse $songVerse)
    {
        abort_if(Gate::denies('song_verse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songVerse->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
