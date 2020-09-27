<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik', 50);
            $table->string('nama', 50);
            $table->string('alamat', 50);
            $table->string('nohp', 20);
            $table->string('foto')->nullable();
            $table->string('tps_id')->references('id')->on('tps');
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
        Schema::dropIfExists('saksi');
    }
}
