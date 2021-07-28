<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            // $table->foreign('pengguna_id')->references('pengguna')->on('id')->onDelete('cascade');
            // $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
            $table->string('nama_aset');
            $table->string('no_aset');
            $table->date('tgl_aset');
            $table->string('asal_perolehan');
            $table->string('rupiah_aset');
            $table->string('tempat_aset');
            $table->string('merk_barang');
            $table->string('kondisi');
            $table->string('image');
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
        Schema::dropIfExists('inventaris');
    }
}