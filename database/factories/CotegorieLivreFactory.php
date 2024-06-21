<?php

namespace Database\Factories;

use App\Models\categorie;
use App\Models\livre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cotegorieLivre>
 */
class CotegorieLivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'livre_id' => livre::factory(),
            'categorie_id' => categorie::factory(),
        ];
    }
}
