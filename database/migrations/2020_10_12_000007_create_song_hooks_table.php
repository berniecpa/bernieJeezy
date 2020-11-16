<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongHooksTable extends Migration
{
    public function up()
    {
        Schema::create('song_hooks', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('song_hook')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
