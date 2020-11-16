<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SongWork extends Model
{
    use SoftDeletes;

    public $table = 'song_works';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'song_title_id',
        'keyword',
        'rhyming_keywords',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function song_title()
    {
        return $this->belongsTo(Song::class, 'song_title_id');
    }
}
