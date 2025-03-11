<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->datetime('created_at')->change(); // Altera para datetime
        });
    }

    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->string('created_at')->change(); // Reverte para string
        });
    }
};
