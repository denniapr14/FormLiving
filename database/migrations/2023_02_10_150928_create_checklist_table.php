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
        Schema::create('checklist', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id_checklist', true);
            $table->integer('id_joblist')->nullable()->index('id_ceklist');
            $table->integer('id_pengawas1')->nullable()->index('id_pengawas1');
            $table->integer('id_pengawas2')->nullable()->index('id_pengawas2_2');
            $table->integer('id_rumah')->nullable()->index('id_rumah');
            $table->integer('id_subkon')->nullable()->index('id_subkon');
            $table->string('foto', 300)->nullable();
            $table->enum('status_cek_pengawas1', ['selesai', 'belum selesai'])->nullable()->default('belum selesai');
            $table->enum('status_cek_pengawas2', ['selesai', 'belum selesai'])->nullable()->default('belum selesai');
            $table->enum('status_checklist', ['selesai', 'terkunci', 'progress', ''])->nullable();
            $table->float('subbobot', 10, 0)->nullable();
            $table->string('lat_checklist', 100)->nullable();
            $table->string('long_checklist', 100)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('tgl_input')->useCurrentOnUpdate()->useCurrent();
            $table->date('tgl_update')->nullable();
            $table->date('tgl_deadline')->nullable();
            $table->integer('id_notifAT')->nullable()->index('id_notifAT');
            $table->integer('id_notifP')->nullable()->index('id_notifP');
            $table->string('status_ceo', 10)->nullable();
            $table->string('status_owner', 10)->nullable();

            $table->index(['id_rumah'], 'id_rumah_2');
            $table->index(['id_joblist'], 'id_ceklist_2');
            $table->index(['id_pengawas2'], 'id_pengawas2');
            $table->index(['id_subkon'], 'id_subkon_2');
            $table->index(['id_pengawas1'], 'id_pengawas1_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist');
    }
};
