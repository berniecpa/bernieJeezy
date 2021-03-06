<?php

namespace App\Http\Requests;

use App\Models\SongHook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSongHookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('song_hook_edit');
    }

    public function rules()
    {
        return [];
    }
}
