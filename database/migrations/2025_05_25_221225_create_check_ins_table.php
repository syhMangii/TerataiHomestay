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
Schema::create('check_ins', function (Blueprint $table) {
    $table->id();
    $table->foreignId('score_history_id')->constrained('score_histories')->onDelete('cascade');
    $table->string('action');
    $table->boolean('is_continous')->default(false);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_ins');
    }
};
