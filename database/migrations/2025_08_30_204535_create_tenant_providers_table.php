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
        Schema::create('tenant_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('provider_id')->constrained()->cascadeOnDelete();
            $table->boolean('enabled')->default(false); // controlled by tenant
            $table->string('status')->nullable(); // controlled by tenant

            $table->string('name');

            $table->string('login')->nullable();

            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('api_token')->nullable();
            $table->string('secret_key')->nullable();

            $table->string('api_url')->nullable();
            $table->string('api_test_url')->nullable();

            $table->string('api_key')->nullable();
            $table->string('api_test_key')->nullable();

            $table->string('api_test_token')->nullable();
            $table->string('api_test_secret')->nullable();

            $table->enum('api_type', ['rest', 'soap', 'grpc'])->default('rest');

            $table->boolean('test_mode')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_providers');
    }
};
