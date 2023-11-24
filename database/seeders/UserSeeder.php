<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for ($i=1; $i < 4; $i++) { 
            User::create([
                'name' => 'User ' . $i,
                'email' => "user$i@gmail.com",
                'password' => bcrypt('12345678'),
            ]);
       }
    }
}
