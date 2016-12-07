<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCopyFromFieldInStrings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('strings', function (Blueprint $table) {
           $table->integer('copy_from')->unsigned()->nullable();
            $table->foreign('copy_from')
                  ->references('id')->on('languages');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
