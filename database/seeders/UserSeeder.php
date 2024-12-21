<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'=>'adminky',
            'email'=>'hungjr147@gmail.com', 
            'password' => Hash::make('password'),
            'status' => '0'
        ]);


        $user->assignRole('Admin');
    }
}
