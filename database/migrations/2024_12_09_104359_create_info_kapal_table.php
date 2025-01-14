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
        Schema::create('kapal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nama_kapal');
            $table->string('jenis_kapal');
            $table->string('dimensi_kapal')->nullable();
            $table->string('bahan_kapal')->nullable();
            $table->string('jumlah_kru')->default(1);
            $table->string('penyimpanan')->nullable();
            $table->string('alat_tangkap')->nullable();
            $table->string('alat_keselamatan')->nullable();
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
        Schema::dropIfExists('info_kapal');
    }
};
