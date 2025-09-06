<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
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
            $table->boolean('enabled')->default(true);

            $table->timestamps();
            $table->softDeletes(); // if you want soft-deletion
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
