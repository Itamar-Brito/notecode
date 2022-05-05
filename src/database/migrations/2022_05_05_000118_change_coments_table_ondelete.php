<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeComentsTableOndelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('coments', function (Blueprint $table) {

            $table->unsignedBigInteger('note_id')->nullable()->change();


            $table->dropForeign(['note_id']);
            $table->foreign('note_id')
                ->references('id')
                ->on('notes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coments', function (Blueprint $table) {
            $table->unsignedBigInteger('note_id')->change();
        });
    }
}
