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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->after('id')->constrained()->cascadeOnDelete();
            // Shop owner (user)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Optional country
            $table->foreignId('country_id')->nullable()->constrained('countries');
            
            // Optional timezone
            $table->foreignId('time_zone_id')->nullable()->constrained('time_zones');
            
            // Optional currency
            $table->foreignId('currency_id')->nullable()->constrained('currencies');

            $table->decimal('wallet_balance', 15, 2)->default(0);

            $table->string('name');
            $table->string('slug')->unique(); // SEO-friendly URL
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
