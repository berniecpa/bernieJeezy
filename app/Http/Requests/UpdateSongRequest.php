<?php

namespace App\Http\Requests;

use App\Models\Song;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSongRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('song_edit');
    }

    public function rules()
    {
        return [
            'song_title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
