<?php

// Migration file for adding status column to pendidikans table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToPendidikansTable extends Migration
{
    public function up()
    {
        Schema::table('pendidikans', function (Blueprint $table) {
            $table->string('status')->default('pending');
        });
    }

    public function down()
    {
        Schema::table('pendidikans', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

