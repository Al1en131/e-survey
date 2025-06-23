<?php

namespace Database\Seeders;

use App\Models\Essay;
use App\Models\Option;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Step;
use App\Models\Likert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get all participants
        $participants = Participant::all();
        // loop the participants so every subject has their answers
        foreach ($participants as $participant) {
            // get all the questions by participant current survey
            $steps = Step::where('survey_id', $participant->survey_id)->where('stepable_type', Question::class)->get();
            // loop the questions to create every answer of the participant current survey
            foreach ($steps as $step) {
                // validate if the question is in essay type or not
                if ($step->stepable->type === 'choices') {
                    // choose a random option of the question
                    $option = fake()->randomElement(Option::where('question_id', $step->stepable->id)->get());

                    // relate the chosen option to the answer of participant
                    $option->answers()->create([
                        'participant_id' => $participant->id,
                        'question_id' => $step->stepable->id,
                    ]);
                } elseif ($step->stepable->type === 'likert') {
                    $likert = fake()->randomElement(Likert::where('likert', '<', (int) $step->stepable->option->first()->option)->get());

                    $likert->answers()->create([
                        'participant_id' => $participant->id,
                        'question_id' => $step->stepable->id,
                    ]);
                } elseif ($step->stepable->type === 'essay') {
                    // create an essay answer for the question
                    $essay = Essay::create([
                        'essay' => fake()->paragraphs(fake()->numberBetween(1, 3), true),
                    ]);

                    // relate the essay to the answer of participant
                    $essay->answers()->create([
                        'participant_id' => $participant->id,
                        'question_id' => $step->stepable->id,
                    ]);
                }
            }
        }
    }
}
