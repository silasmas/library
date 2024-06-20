<?php

namespace Database\Seeders;

use App\Models\livre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i = 0; $i < 50; $i++) {
        //     livre::create([
        //         'column1' => 'Valeur ' . $i,
        //         'column2' => 'Autre valeur ' . $i,
        //         // Générez d'autres valeurs aléatoires pour les colonnes selon vos besoins
        //     ]);
        // }
        livre::factory()->count(50)->create();
    }
}
