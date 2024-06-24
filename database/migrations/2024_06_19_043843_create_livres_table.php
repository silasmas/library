<?php

use App\Models\emplacement;
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
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('auteur')->nullable();
            $table->string('isbn')->unique();
            $table->date('datepublication')->nullable();
            $table->string('nbrpage')->nullable();
            $table->string('langue')->nullable();
            $table->string('editeur')->nullable();
            $table->string('qte_init')->nullable();
            $table->string('qte_sortie')->nullable();
            $table->longText('description')->nullable();
            $table->string('couverture')->nullable();
            $table->string('couverture2')->nullable();
            $table->string('couverture3')->nullable();
            $table->string('guidevideo')->nullable();
            $table->integer('active')->default('1');
            $table->foreignIdFor(emplacement::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
