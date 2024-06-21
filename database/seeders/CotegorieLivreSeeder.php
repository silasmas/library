<?php

namespace Database\Seeders;

use App\Models\cotegorieLivre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CotegorieLivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        cotegorieLivre::factory()->count(90)->create();

    }
}
