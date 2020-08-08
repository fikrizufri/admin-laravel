<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pembayaran')->nullable();
            $table->string("no_pembayaran", 50);
            $table->date("tgl_pembayaran");
            $table->string("penerima", 20);
            $table->string("terima_dari", 20);
            $table->string("sebanyak", 20);
            $table->string("sisa_pembayaran", 20);
            $table->enum('status', [1, 0])->default(1)->nullable();
            $table->integer('id_jadwal')->unsigned()->nullable();
            $table->foreign('id_jadwal')->references('id')->on('jadwal')->onDelete('cascade');
            $table->integer('id_peserta')->unsigned()->nullable();
            $table->foreign('id_peserta')->references('id')->on('peserta')->onDelete('cascade');
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
        Schema::dropIfExists('pembayarans');
    }
}
