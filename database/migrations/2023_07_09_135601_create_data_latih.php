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
        Schema::create('data_latih', function (Blueprint $table) {
            $table->id();
            $table->enum('cuaca', ['panas', 'hujan', 'berawan', 'cerah']);
            $table->float('luas_lahan');
            $table->float('pupuk_urea');
            $table->float('pupuk_npk');
            $table->string('komoditas');
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
        Schema::dropIfExists('data_latih');
    }
};
