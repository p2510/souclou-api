<?php

namespace Database\Factories;

use App\Models\GameQuizchallenge;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameQuizchallenge>
 */
class GameQuizchallengeFactory extends Factory
{
    protected $model = GameQuizchallenge::class;

    public function definition()
    {
        return [
            'question' => $this->faker->sentence,
            'answer' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'classroom' => $this->faker->randomElement(['Sixième', 'Cinquième','Quatrième', 'Troisième','Second A1', 'Second A2','Première C','Première D','Première A1','Première A2','Terminal C','Terminal A1','Terminal A2','Terminal D']),
            'suggestion_one' => $this->faker->word,
            'suggestion_two' => $this->faker->word,
            'suggestion_three' => $this->faker->word,
            'suggestion_four' => $this->faker->word,
        ];
    }
}