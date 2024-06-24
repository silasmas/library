<?php

use App\Models\salle;
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
        Schema::create('compartiments', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('image')->nullable();
            $table->foreignIdFor(salle::class);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compartiments');
    }
};
