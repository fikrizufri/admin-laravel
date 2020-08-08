<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nama", 30);
            $table->string("hari", 30);
            $table->string("jam", 20);
            $table->integer('id_program')->unsigned()->nullable();
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
            $table->integer('id_pengajar')->unsigned()->nullable();
            $table->foreign('id_pengajar')->references('id')->on('pengajar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
