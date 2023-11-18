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
        Schema::create('panens', function (Blueprint $table) {
            $table->id();
            $table->integer('lahan_id');
            $table->integer('masuk_id');
            $table->date('tanggal_tanam');
            $table->date('tanggal_panen');
            $table->integer('jumlah_panen');
            $table->string('satuan_panen', 10);
            $table->integer('jumlah_gagal');
            $table->string('satuan_gagal', 10);
            $table->string('keterangan', 50);
            $table->string('gambar', 50);
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
        Schema::dropIfExists('panens');
    }
};
