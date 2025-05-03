<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Supervisor',
            'email' => 'supervisor@example.com',
            'password' => Hash::make('supervisor231'), // Replace 'admin_password' with the actual password
            'role' => 2,
            'created_at' => now(), 
        ]);
    }
}
