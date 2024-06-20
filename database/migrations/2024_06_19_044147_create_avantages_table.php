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
        Schema::create('avantages', function (Blueprint $table) {
            $table->id();
            $table->json('type');
            $table->json('prix');
            $table->json('monaie');
            $table->json('delai');
            $table->json('av1')->nullable();
            $table->json('av2')->nullable();
            $table->json('av4')->nullable();
            $table->json('av5')->nullable();
            $table->json('av6')->nullable();
            $table->json('av7')->nullable();
            $table->json('av8')->nullable();
            $table->json('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avantages');
    }
};
