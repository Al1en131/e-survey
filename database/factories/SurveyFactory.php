<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = Str::title(fake()->words(fake()->numberBetween(8, 10), true));

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraphs(1, true),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(rand(0, 365)),
        ];
    }
}
