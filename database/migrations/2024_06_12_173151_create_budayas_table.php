<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_budayas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudayasTable extends Migration
{
    public function up()
    {
        Schema::create('budayas', function (Blueprint $table) {
            $table->id();
            $table->string('poster')->nullable();
            $table->string('nama_festival');
            $table->datetime('tanggal_waktu');
            $table->string('lokasi');
            $table->integer('batasan_usia')->nullable();
            $table->decimal('harga_tiket', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budayas');
    }
    
}
