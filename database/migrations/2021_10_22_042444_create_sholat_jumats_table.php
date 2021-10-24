<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSholatJumatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sholat_jumats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_akun');
            $table->string('imam');
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
        Schema::dropIfExists('sholat_jumats');
    }
}
