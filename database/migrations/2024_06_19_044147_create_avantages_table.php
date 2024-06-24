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
            $table->string('type');
            $table->string('prix');
            $table->string('monaie');
            $table->string('delai');
            $table->string('av1')->nullable();
            $table->string('av2')->nullable();
            $table->string('av4')->nullable();
            $table->string('av5')->nullable();
            $table->string('av6')->nullable();
            $table->string('av7')->nullable();
            $table->string('av8')->nullable();
            $table->string('description')->nullable();
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
