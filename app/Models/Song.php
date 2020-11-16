<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Song extends Model
{
    use SoftDeletes;

    public $table = 'songs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'song_title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function songTitleSongSummaries()
    {
        return $this->hasMany(SongSummary::class, 'song_title_id', 'id');
    }

    public function songTitleSongWorks()
    {
        return $this->hasMany(SongWork::class, 'song_title_id', 'id');
    }

    public function titleSongHooks()
    {
        return $this->hasMany(SongHook::class, 'title_id', 'id');
    }

    public function titleSongVerses()
    {
        return $this->hasMany(SongVerse::class, 'title_id', 'id');
    }
}
