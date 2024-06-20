<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkonomisTable extends Migration
{
    public function up()
    {
        Schema::create('ekonomis', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->enum('kategori', ['nabati', 'hewani']);
            $table->string('nama_pangan');
            $table->decimal('harga', 10, 2);
            $table->date('tanggal_masuk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ekonomis');
    }
}
