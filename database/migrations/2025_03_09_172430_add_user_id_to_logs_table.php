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
        if (!Schema::hasColumn('logs', 'user_id')) {
            Schema::table('logs', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable()->after('context');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('logs', 'user_id')) {
            Schema::table('logs', function (Blueprint $table) {
                $table->dropColumn('user_id');
            });
        }
    }
};
