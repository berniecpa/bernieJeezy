<?php

namespace App\Http\Requests;

use App\Models\SongVerse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSongVerseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('song_verse_edit');
    }

    public function rules()
    {
        return [];
    }
}
