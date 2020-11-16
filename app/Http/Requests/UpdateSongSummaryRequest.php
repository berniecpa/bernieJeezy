<?php

namespace App\Http\Requests;

use App\Models\SongSummary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSongSummaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('song_summary_edit');
    }

    public function rules()
    {
        return [];
    }
}
