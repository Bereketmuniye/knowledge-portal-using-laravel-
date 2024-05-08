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
        Schema::create('answers', function (Blueprint $table) {
    $table->id();
    $table->text('body');
    $table->unsignedBigInteger('question_id');
    $table->unsignedBigInteger('answered_by');
    $table->timestamps();
    $table->foreign('question_id')->references('id')->on('questions');
    $table->foreign('answered_by')->references('id')->on('users');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
