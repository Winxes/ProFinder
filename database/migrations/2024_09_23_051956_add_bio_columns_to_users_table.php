<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('department')->nullable();
            $table->string('course')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('bio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('department');
            $table->dropColumn('course');
            $table->dropColumn('phone_number');
            $table->dropColumn('bio');
        });
    }
};
