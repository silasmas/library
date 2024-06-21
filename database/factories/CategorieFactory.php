<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = ['Theologie', 'Finace', 'Economie', 'Medecine', 'Mathematique', 'Droit', 'Philosophie', 'Français'];
        $selectedImages = [];
        $numberOfImagesToSelect = 5;

        for ($i = 0; $i < $numberOfImagesToSelect; $i++) {
            $randomIndex = array_rand($images);
            $selectedImages[] = $images[$randomIndex];
        }
        return [
            'nom' => $selectedImages[1],
            'description' => $this->faker->paragraph,
        ];
    }
}
