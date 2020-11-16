<?php

namespace App\Http\Requests;

use App\Models\SongSummary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySongSummaryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('song_summary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:song_summaries,id',
        ];
    }
}
