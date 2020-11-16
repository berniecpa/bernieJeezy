<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSongHooksTable extends Migration
{
    public function up()
    {
        Schema::table('song_hooks', function (Blueprint $table) {
            $table->unsignedInteger('title_id')->nullable();
            $table->foreign('title_id', 'title_fk_2379558')->references('id')->on('songs');
        });
    }
}
