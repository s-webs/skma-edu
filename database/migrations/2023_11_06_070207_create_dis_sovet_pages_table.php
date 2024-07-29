<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dis_sovet_pages', function (Blueprint $table) {
            $table->id();

            $table->string('kk_title');
            $table->string('ru_title');
            $table->string('en_title');

            $table->longText('kk_content')->nullable();
            $table->longText('ru_content')->nullable();
            $table->longText('en_content')->nullable();

            $table->longText('kk_files')->nullable();
            $table->longText('ru_files')->nullable();
            $table->longText('en_files')->nullable();

            $table->string('kk_slug')->unique();
            $table->string('ru_slug')->unique();
            $table->string('en_slug')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dis_sovet_pages');
    }
};
