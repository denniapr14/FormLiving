<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulir_pesananTable extends Migration{
    
    public function up(){
        Schema::create('formulir_pesanan', function (Blueprint $table) {
            $table->id();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('formulir_pesanan');
    }
}