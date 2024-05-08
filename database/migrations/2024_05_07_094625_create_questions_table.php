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
        Schema::create('questions', function (Blueprint $table) {
    $table->id();
    $table->text('body');
    $table->unsignedBigInteger('asked_by');
    $table->unsignedBigInteger('answered_by')->nullable();
    $table->timestamps();
    $table->foreign('asked_by')->references('id')->on('users');
    $table->foreign('answered_by')->references('id')->on('users');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
