<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('question_survey', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('number');
            $table->boolean('is_active')->default(true);
            $table->foreignId('question_id')->constrained();
            $table->foreignId('survey_id')->constrained();
            $table->index(['question_id', 'survey_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('question_survey');
    }
};
