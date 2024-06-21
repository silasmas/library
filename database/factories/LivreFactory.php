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
        // $response = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=subject:book&startIndex=' . rand(1, 100));
        // $data = json_decode($response, true);
        // $randomBook = $data['items'][array_rand($data['items'])];
        // $r=$randomBook['volumeInfo'];
        $images = ['l1.jpg', 'l2.jpg', 'l3.jpg', 'l4.jpg', 'l5.jpg', 'l6.jpg', 'l7.jpg', 'l8.jpg'];
        $selectedImages = [];
        $numberOfImagesToSelect = 5;

        for ($i = 0; $i < $numberOfImagesToSelect; $i++) {
            $randomIndex = array_rand($images);
            $selectedImages[] = $images[$randomIndex];
        }

        // $video = ['https://www.youtube.com/watch?v=xhFn9ClfOjY','https://www.youtube.com/watch?v=zwT5w9n1Mnk'];
        // $selectedVideo = [];
        // $numberOfVideoToSelect = 2;
        // for ($i = 0; $i < $numberOfVideoToSelect; $i++) {
        //     $randomIndex = array_rand($video);
        //     $selectedVideo[] = $video[$randomIndex];
        // }
        return [
            'titre' =>  $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'auteur' => $this->faker->name,
            'isbn' => $this->faker->isbn13,
            'datepublication' => $this->faker->date,
            'nbrpage' => $this->faker->numberBetween(100, 1000),
            'langue' => $this->faker->languageCode,
            'editeur' => $this->faker->company,
            'qte_init' => 50,
            'qte_sortie' => 0,
            'description' => $this->faker->paragraph,
            'couverture' => $selectedImages[0],
            'couverture2' => $selectedImages[1],
            'couverture3' => $selectedImages[2],
            'guidevideo' => "https://www.youtube.com/embed/zwT5w9n1Mnk?si=PTJ6lpHlt0LcRxN-",
        ];
    }
}
