<?php

use App\Models\livre;
use App\Models\rayon;
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
        Schema::create('emplacements', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('reference')->nullable();
            $table->string('image')->nullable();
            $table->foreignIdFor(livre::class);
            $table->foreignIdFor(rayon::class);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplacements');
    }
};
