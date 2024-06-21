<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('antrians', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('loket_id');
        //     $table->string('nama_outlet');
        //     $table->string('alamat_outlet');
        //     $table->string('no_telp');
        //     $table->integer('nomor_antrian');
        //     $table->string('jenis_antrian');
        //     $table->string('keterangan');
        //     $table->integer('count');
        //     $table->string('hari');
        //     $table->date('tanggal');
        //     $table->timestamps();

        //     $table->foreign('loket_id')->references('id')->on('lokets')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrians');
    }
};
