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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik');
            $table->dropColumn('nip');
        });
        Schema::table('users', function (Blueprint $table) {

            $table->bigInteger('nik')->after('email')->nullable();
            $table->bigInteger('nip')->after('nik')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bigint_in_users', function (Blueprint $table) {
            //
        });
    }
};
