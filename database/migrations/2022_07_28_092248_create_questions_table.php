<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 500);
            $table->string('code', 10)->nullable();
            $table->unsignedSmallInteger('number');
            $table->boolean('is_active')->default(true);
            $table->foreignId('dimension_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('survey_id')->nullable()->constrained()->nullOnDelete();
            $table->string('type', 50)->nullable();
            $table->json('options')->nullable();
            $table->enum('category', ['survey','participant']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
