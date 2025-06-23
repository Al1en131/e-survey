<?php

namespace Database\Seeders;

use App\Models\Management;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $management = Management::firstOrCreate([
                'title' => 'One Assessment, Endless Possibilities',
                'description' => 'Your Insights are the driving force behind Our Solution',
            ]);
    }
}
