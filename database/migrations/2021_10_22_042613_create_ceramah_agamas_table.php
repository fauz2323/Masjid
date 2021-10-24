<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeramahAgamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceramah_agamas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_akun');
            $table->string('ustad');
            $table->text('keterangan');
            $table->string('penanggung_jawab');
            $table->timestamps();

            $table->foreign('id_akun')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ceramah_agamas');
    }
}
