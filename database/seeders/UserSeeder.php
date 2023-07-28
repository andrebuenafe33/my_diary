<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a new user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'role' => '1',
            'password' => Hash::make('password'),  
        ]);

        
        
    }
}
