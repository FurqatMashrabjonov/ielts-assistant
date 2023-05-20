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
        Schema::create('cambridges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pdf_path')->nullable();
            $table->string('key');
            $table->string('audio_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cambridges');
    }
};
