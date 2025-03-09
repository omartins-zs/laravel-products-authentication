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
            // Adiciona a coluna 'user_id' que pode ser nula
            $table->unsignedBigInteger('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            // Remove a coluna 'user_id' caso seja necessário reverter a migration
            $table->dropColumn('user_id');
        });
    }
};
