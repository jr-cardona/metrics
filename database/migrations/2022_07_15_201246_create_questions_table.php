<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('number');
            $table->string('title', 500);
            $table->boolean('is_active')->default(1);
            $table->enum('type', [
                'text',
                'textarea',
                'checkbox',
                'check',
                'date',
                'datetime',
                'select',
                'integer',
                'radiobutton',
                'phone',
                'email',
                'url',
            ])->default('radiobutton');
            $table->json('options')->nullable();
            $table->foreignId('dimension_id')->nullable()->constrained()->nullOnDelete();
            $table->softDeletes();
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
