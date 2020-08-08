<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("nip")->default(0);
            $table->string("nama", 20);
            $table->string("tmpt_lhr", 15);
            $table->date("tgl_lhr");
            $table->enum('jk', [1, 0])->default(1)->nullable();
            $table->string("alamat", 40);
            $table->string("telepon", 30);
            $table->string("telepon_wali", 30);
            $table->string("kegiatan", 30);
            $table->string("ket_kegiatan", 50);
            $table->enum('status', [1, 0])->default(1)->nullable();
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
        Schema::dropIfExists('pesertas');
    }
}
