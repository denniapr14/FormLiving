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
        Schema::create('calon_user', function (Blueprint $table) {
            $table->integer('id_cu', true);
            $table->integer('codecluster')->nullable()->index('codecluster');
            $table->integer('id_user_admin')->nullable();
            $table->string('nama_cu', 50);
            $table->string('telepon_cu', 20);
            $table->string('email_cu', 150)->nullable();
            $table->date('tgl_meet');
            $table->time('jam_meet');
            $table->text('pesan');
            $table->enum('status_cu', ['Unconfirmed', 'Yes', 'Transfer'])->nullable();
            $table->enum('from_cu', ['Whatsapp', 'Instagram', 'Facebook', 'Email', 'Website'])->nullable();
            $table->timestamp('tgl_input_cu')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calon_user');
    }
};
