<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddControlNameIdIntoStringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strings', function (Blueprint $table) {
          
            $table->integer('control_name_id')->unsigned()->nullable();
            $table->foreign('control_name_id')
                  ->references('id')->on('control_names')
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
             $table->dropForeign('strings_control_name_id_foreign');
             $table->dropColumn('control_name_id');
        });
    }
}
