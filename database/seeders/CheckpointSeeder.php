<?php

namespace Database\Seeders;

use App\Models\Checkpoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Checkpoint::factory(10)->create();
    }
}
