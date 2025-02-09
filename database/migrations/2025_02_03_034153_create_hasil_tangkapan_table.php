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
        Schema::create('hasil_tangkapan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_permohonan_berlayar')->constrained('permohonan_berlayar')->onDelete('cascade');
            $table->string('nama_tangkapan');
            $table->string('jumlah_tangkapan');
            $table->string('satuan');
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
        Schema::dropIfExists('hasil_tangkapan');
    }
};