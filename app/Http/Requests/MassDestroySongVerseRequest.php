<?php

namespace App\Http\Requests;

use App\Models\SongVerse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySongVerseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('song_verse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:song_verses,id',
        ];
    }
}
