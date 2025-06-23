<?php

namespace Database\Seeders;

use App\Models\Checkpoint;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surveys = Survey::all();
        foreach ($surveys as $survey) {
            for ($i = 0; $i < 11; $i++) {
                if ($i === 5) {
                    $title = Str::title(fake()->words(fake()->numberBetween(9, 12), true));
                    $checkpoint = Checkpoint::create([
                        'title' => $title,
                        'slug' => Str::slug($title),
                        'description' => fake()->paragraphs(fake()->numberBetween(2, 4), true),
                    ]);

                    $checkpoint->steps()->create([
                        'survey_id' => $survey->id,
                        'order' => $i + 1,
                    ]);
                } else {
                    $question = Question::create([
                        'question' => Str::ucfirst(fake()->words(fake()->numberBetween(3, 8), true)),
                        'type' => fake()->randomElement(['choices', 'likert', 'essay']),
                    ]);

                    $question->steps()->create([
                        'survey_id' => $survey->id,
                        'order' => $i + 1,
                    ]);
                }
            }
        }
    }
}
