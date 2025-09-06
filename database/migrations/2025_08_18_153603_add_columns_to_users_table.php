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
            $table->foreignId('language_id')
                  ->nullable(false)
                  ->default(1) // assuming English id = 1 in languages table
                  ->constrained('languages')
                  ->after('tenant_id');
            $table->string('avatar')->nullable();
            $table->boolean('is_active')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
            $table->dropColumn('avatar');
            table->dropColumn('is_active');
        });
    }
};
