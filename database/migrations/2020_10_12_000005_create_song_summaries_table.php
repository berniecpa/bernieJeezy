<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongSummariesTable extends Migration
{
    public function up()
    {
        Schema::create('song_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('song_summary')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
