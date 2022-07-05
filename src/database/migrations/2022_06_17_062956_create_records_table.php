<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('user_id');
            $table->integer('N');
            $table->integer('dotInstall');
            $table->integer('POSSE');
            $table->integer('HTML');
            $table->integer('CSS');
            $table->integer('JavaScript');
            $table->integer('PHP');
            $table->integer('ＳＱＬ');
            $table->integer('Laravel');
            $table->integer('SHELL');
            $table->integer('other');
            $table->float('time', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
