<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongVersesTable extends Migration
{
    public function up()
    {
        Schema::create('song_verses', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('song_verse')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
