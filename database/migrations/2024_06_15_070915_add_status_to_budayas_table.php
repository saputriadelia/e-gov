<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBudayasTable extends Migration
{
    public function up()
    {
        Schema::table('budayas', function (Blueprint $table) {
            $table->string('status')->default('draft'); // Menambahkan field status
        });
    }

    public function down()
    {
        Schema::table('budayas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
