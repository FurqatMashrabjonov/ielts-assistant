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
        Schema::create('speaking_answer_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('speaking_answer_id')->constrained()->onDelete('cascade');
            $table->boolean('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speaking_answer_votes');
    }
};
