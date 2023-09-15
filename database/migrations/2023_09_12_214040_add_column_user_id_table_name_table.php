<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUserIdTableNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tablename', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id') //tao khoa ngoai tu cot user_id cua bang tablename
                ->references('id')  //den cot id
                ->on('users')    //cua bang user
                ->cascadeOnDelete(); //khi user bi xoa thi cac bang do user do tao cung bi xoa theo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tablename', function (Blueprint $table) {
            //
        });
    }
}
