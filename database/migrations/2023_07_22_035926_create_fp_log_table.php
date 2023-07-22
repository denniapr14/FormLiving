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
        Schema::create('fp_log', function (Blueprint $table) {
            $table->integer('id_fp_log', true);
            $table->integer('id_formulir')->nullable();
            $table->enum('status_fp_log', ['insert', 'updated']);
            $table->timestamp('date_fp_log')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fp_log');
    }
};
