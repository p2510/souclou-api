<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course' => $this->faker->randomElement(['Mathématiques', 'Physique', 'Chimie', 'SVT', 'Français', 'Histoire-Géographie', 'Espagnol', 'Anglais']),
            'classroom' => $this->faker->randomElement(['Sixième', 'Cinquième', 'Quatrième', 'Troisième', 'Seconde', 'Première', 'Terminale']),
            'title' => $this->faker->word,
            'chapter' => $this->faker->word,
            'content' => $this->faker->paragraph,
        ];
    }
}