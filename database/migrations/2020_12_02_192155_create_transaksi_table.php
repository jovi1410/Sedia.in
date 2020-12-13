<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pembeli');
            $table->unsignedBigInteger('no_meja');
            // $table->foreign('no_meja')->references('no_meja')->on('meja');
            $table->unsignedBigInteger('warung_id');
            $table->foreign('warung_id')->references('id_warung')->on('warung');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menu_tabel');
            $table->integer('jumlah');
            $table->string('metode_pemesanan');
            $table->integer('status_meja');
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
        Schema::dropIfExists('transaksi');
    }
}
