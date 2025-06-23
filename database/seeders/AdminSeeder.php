<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->environment('production')) {
            $admin = User::firstOrCreate([
                'name' => 'Superadmin',
                'email' => 'superadmin@esurvey.com',
                'password' => bcrypt('8@oOc3wg0)'),
            ]);
    
            $admin->assignRole('admin');
        } else {
            $admin = User::firstOrCreate([
                'name' => 'Superadmin',
                'email' => 'superadmin@esurvey.com',
                'password' => bcrypt('password'),
            ]);
    
            $admin->assignRole('admin');
        }
    }
}
