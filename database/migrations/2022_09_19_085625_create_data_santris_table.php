<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('status');
            $table->string('jenis_kelamin');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->string('nama_ortu');
            $table->string('tempat_tinggal');
            $table->string('noHp_ortu');
            $table->string('kelas');
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
        Schema::dropIfExists('data_santris');
    }
}
