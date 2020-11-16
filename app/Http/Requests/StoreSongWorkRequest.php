<?php

namespace App\Http\Requests;

use App\Models\SongWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSongWorkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('song_work_create');
    }

    public function rules()
    {
        return [
            'keyword' => [
                'string',
                'nullable',
            ],
        ];
    }
}
