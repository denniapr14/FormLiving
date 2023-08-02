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
        Schema::create('subkon', function (Blueprint $table) {
            $table->integer('id_subkon', true);
            $table->string('nama_subkon', 200);
            $table->string('no_hp_subkon', 20);
            $table->text('alamat_subkon');
            $table->string('email_subkon', 200);
            $table->string('perusahaan_subkon', 200)->nullable();
            $table->enum('status_subkon', ['Aktif', 'Nonaktif']);
            $table->timestamp('tgl_input_subkon')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subkon');
    }
};
