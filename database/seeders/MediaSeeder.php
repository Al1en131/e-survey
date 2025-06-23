<?php

namespace Database\Seeders;

use App\Models\Checkpoint;
use App\Models\Management;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkpoints = Checkpoint::all();
        foreach ($checkpoints as $checkpoint) {
            $imageUrl = 'https://picsum.photos/400';
            $newFileName = Str::random(8) . '.png';
            $checkpoint->addMediaFromUrl($imageUrl)
                ->usingFileName($newFileName)
                ->toMediaCollection('checkpoint');
        }

        $questions = Question::inRandomOrder()->take(20)->get();
        foreach ($questions as $question) {
            $imageUrl = 'https://picsum.photos/400';
            $newFileName = Str::random(8) . '.png';
            $question->addMediaFromUrl($imageUrl)
                ->usingFileName($newFileName)
                ->toMediaCollection('question');
        }      
    }
}
