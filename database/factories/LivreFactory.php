<?php

namespace Database\Factories;

use App\Models\livre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\livre>
 */
class LivreFactory extends Factory
{
    protected $model = livre::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence,
            'auteur' => $this->faker->name,
            'isbn' => $this->faker->isbn13,
            'datepublication' => $this->faker->date,
            'nbrpage' => $this->faker->numberBetween(100, 1000),
            'langue' => $this->faker->languageCode,
            'editeur' => $this->faker->company,
            'qte_init' => 50,
            'qte_sortie' => 0,
            'description' => $this->faker->paragraph,
            'couverture' => $this->faker->imageUrl(),
            'couverture2' => $this->faker->imageUrl(),
            'couverture3' => $this->faker->imageUrl(),
            'guidevideo' => $this->faker->url,
        ];
    }
}
