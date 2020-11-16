<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSongHookRequest;
use App\Http\Requests\UpdateSongHookRequest;
use App\Http\Resources\Admin\SongHookResource;
use App\Models\SongHook;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SongHookApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('song_hook_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongHookResource(SongHook::with(['title'])->get());
    }

    public function store(StoreSongHookRequest $request)
    {
        $songHook = SongHook::create($request->all());

        return (new SongHookResource($songHook))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SongHook $songHook)
    {
        abort_if(Gate::denies('song_hook_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SongHookResource($songHook->load(['title']));
    }

    public function update(UpdateSongHookRequest $request, SongHook $songHook)
    {
        $songHook->update($request->all());

        return (new SongHookResource($songHook))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SongHook $songHook)
    {
        abort_if(Gate::denies('song_hook_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $songHook->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
