<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TraineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Trainee',
            'email' => 'trainee@example.com',
            'password' => Hash::make('trainee231'), // Replace 'admin_password' with the actual password
            'role' => 3,
            'created_at' => now(), 
        ]);
    }
}
