<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = Question::all();
        foreach ($questions as $question) {
            if ($question->type === 'choices') {
                for ($i = 0; $i < fake()->numberBetween(4, 5); $i++) {
                    Option::create([
                        'question_id' => $question->id,
                        'option' => fake()->words(fake()->numberBetween(2, 3), true),
                    ]);
                }
            } elseif ($question->type === 'likert') {
                Option::create([
                    'question_id' => $question->id,
                    'option' => fake()->randomElement([5, 10]),
                ]);
            }
        }
    }
}
