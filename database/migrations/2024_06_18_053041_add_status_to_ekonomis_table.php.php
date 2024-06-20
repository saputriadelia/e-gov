<?php

// Migration file for adding status column to ekonomis table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToEkonomisTable extends Migration
{
    public function up()
    {
        Schema::table('ekonomis', function (Blueprint $table) {
            $table->string('status')->default('pending');
        });
    }

    public function down()
    {
        Schema::table('ekonomis', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
