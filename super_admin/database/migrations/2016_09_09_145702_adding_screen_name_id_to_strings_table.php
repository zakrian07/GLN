<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingScreenNameIdToStringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strings', function (Blueprint $table) {
          
            $table->integer('screen_name_id')->unsigned()->nullable();
            $table->foreign('screen_name_id')
                  ->references('id')->on('screen_names')
                  ->onDelete('set null');
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
        Schema::table('strings', function (Blueprint $table) {
             $table->dropForeign('strings_screen_name_id_foreign');
             $table->dropColumn('screen_name_id');
        });
    }
}
