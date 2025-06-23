<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->environment('production')){
            $this->call([
                RoleSeeder::class,
                AdminSeeder::class,
                ManagementSeeder::class
            ]);
        }else{
            $this->call([
                RoleSeeder::class,
                AdminSeeder::class,
                UserSeeder::class,
                SurveySeeder::class,
                ParticipantSeeder::class,
                StepSeeder::class,
                OptionSeeder::class,
                LikertSeeder::class,
                AnswerSeeder::class,
                ManagementSeeder::class,
                MediaSeeder::class,
            ]);
        }
    }
}
