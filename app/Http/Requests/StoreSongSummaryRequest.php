<?php

namespace App\Http\Requests;

use App\Models\SongSummary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSongSummaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('song_summary_create');
    }

    public function rules()
    {
        return [];
    }
}
