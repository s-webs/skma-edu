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
        Schema::create('dis_sovet_announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_program_id')->constrained()->onDelete('cascade');
            $table->string('kk_title');
            $table->string('ru_title');
            $table->string('en_title');
            $table->longText('kk_content')->nullable();
            $table->longText('ru_content')->nullable();
            $table->longText('en_content')->nullable();
            $table->longText('files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dis_sovet_announcements');
    }
};
