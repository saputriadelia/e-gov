<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikansTable extends Migration
{
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->year('tahun');
            $table->string('klasifikasi');
            $table->integer('jumlah_siswa_sd')->nullable()->default(0);
            $table->integer('jumlah_siswa_smp')->nullable()->default(0);
            $table->integer('jumlah_siswa_sma')->nullable()->default(0);
            $table->integer('jumlah_sekolah_sd')->nullable()->default(0);
            $table->integer('jumlah_sekolah_smp')->nullable()->default(0);
            $table->integer('jumlah_sekolah_sma')->nullable()->default(0);
            $table->integer('jumlah_guru_sd')->nullable()->default(0);
            $table->integer('jumlah_guru_smp')->nullable()->default(0);
            $table->integer('jumlah_guru_sma')->nullable()->default(0);
            $table->integer('total_siswa')->nullable()->default(0);
            $table->integer('total_sekolah')->nullable()->default(0);
            $table->integer('total_guru')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendidikans');
    }
}
