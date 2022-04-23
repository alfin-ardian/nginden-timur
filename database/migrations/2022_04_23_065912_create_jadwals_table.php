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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sambung');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('pengajar_pertama')->nullable();
            $table->string('pengajar_kedua')->nullable();
            $table->string('pengajar_ketiga')->nullable();
            $table->string('materi_pertama')->nullable();
            $table->string('materi_kedua')->nullable();
            $table->string('materi_ketiga')->nullable();
            $table->string('tempat');
            $table->string('link')->nullable();
            $table->string('peserta');
            $table->timestamps();
            $table->softDeletes();
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
