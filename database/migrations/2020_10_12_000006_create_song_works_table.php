<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongWorksTable extends Migration
{
    public function up()
    {
        Schema::create('song_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keyword')->nullable();
            $table->longText('rhyming_keywords')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
