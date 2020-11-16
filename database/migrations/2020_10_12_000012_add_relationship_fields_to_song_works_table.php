<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSongWorksTable extends Migration
{
    public function up()
    {
        Schema::table('song_works', function (Blueprint $table) {
            $table->unsignedInteger('song_title_id')->nullable();
            $table->foreign('song_title_id', 'song_title_fk_2374167')->references('id')->on('songs');
        });
    }
}
