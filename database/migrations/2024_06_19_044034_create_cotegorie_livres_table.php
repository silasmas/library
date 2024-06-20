<?php

use App\Models\categorie;
use App\Models\livre;
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
        Schema::create('cotegorie_livres', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(livre::class);
            $table->foreignIdFor(categorie::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotegorie_livres');
    }
};
