<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStringGlnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('screen_name');
            $table->string('control_name');
            $table->string('key')->unique()->nullable(false);
            $table->text('value')->nullable(false);
            $table->text('purpose');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->nullable(false)
                  ->references('id')->on('languages')
                  ->onDelete('cascade');
            $table->integer('is_active')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strings');
    }
}
