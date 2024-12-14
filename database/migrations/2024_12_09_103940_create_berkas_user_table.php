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
        Schema::create('berkas_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('file_ktp');
            $table->string('file_pkl');
            $table->string('file_bpjs');
            $table->string('file_sertif_kapal');
            $table->string('file_kesehatan');
            $table->boolean('diterima')->default(0);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('berkas_user');
    }
};