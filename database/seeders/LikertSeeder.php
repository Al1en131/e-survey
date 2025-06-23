<?php

namespace Database\Seeders;

use App\Models\Likert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            # code...
            Likert::create([
                'likert' => $i,
            ]);
        }
    }
}
