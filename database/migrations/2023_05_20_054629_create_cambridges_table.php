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
            $table->string('key');
            $table->string('audio_file_id')->nullable();
            $table->string('pdf_file_id')->nullable();
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
