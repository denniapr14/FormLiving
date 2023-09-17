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
        Schema::table('tipe_rumah', function (Blueprint $table) {
            //
            $table->enum('deleted_tr', ['true', 'false'])->default('false')->after('tangga_tr');
            $table->dateTime('deleted_tr_at')->nullable()->after('deleted_tr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipe_rumah', function (Blueprint $table) {
            //
        });
    }
};
