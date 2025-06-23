<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Participant;
use App\Models\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surveys = Survey::all();
        foreach ($surveys as $survey) {
            $reset = true;
            for ($i = 0; $i < 10; $i++) {
                Participant::create([
                    'survey_id' => $survey->id,
                    'user_id' => fake()->unique($reset)->randomElement(
                        User::whereHas('roles', function ($q) {
                            return $q->where('name', '!=', 'admin');
                        })->pluck('id')
                    ),
                    'is_finish' => 1,
                ]);
                $reset = false;
            }
        }
    }
}
