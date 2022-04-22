<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('id_role')->default(4);
            $table->integer('id_dapukan')->nullable();
            $table->integer('id_pernikahan')->nullable();
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('wa');
            $table->string('foto')->nullable();
            $table->char('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->char('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
