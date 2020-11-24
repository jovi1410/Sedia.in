<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_tabel', function (Blueprint $table) {
            $table->bigIncrements('id_menu');
            $table->integer('id_warung');
            $table->string('nama_menu');
            $table->string('jenis_menu');
            $table->string('harga');
            $table->integer('stok');
            $table->string('avatar');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('menu_tabel');
    }
}
