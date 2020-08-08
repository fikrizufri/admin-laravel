<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajar', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nama",30);
            $table->string("tempat_lahir",20);
            $table->date("tgl_lahir");
            $table->enum("jk", [1,0]);
            $table->string("alamat",40);
            $table->string("telepon",13);
            $table->text("email");
            $table->integer('id_program')->unsigned()->nullable();
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
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
        Schema::dropIfExists('pengajars');
    }
}
