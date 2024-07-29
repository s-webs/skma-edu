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
        Schema::create('dis_sovet_documents', function (Blueprint $table) {
            $table->id();
            $table->string('kk_title');
            $table->string('ru_title');
            $table->string('en_title');
            $table->string('kk_file');
            $table->string('ru_file');
            $table->string('en_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dis_sovet_documents');
    }
};
