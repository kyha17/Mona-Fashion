<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'John Doe',
                'email' => 'lemanh@gmail.com',
                'password' => Hash::make('12345678'),
                'is_admin' => 1,
            ],
            [
                'name' => 'John Doe',
                'email' => 'clonegolike500@gmail.com',
                'password' => Hash::make('12345678'),
                'is_admin' => 0,
            ]
        ];

        DB::table('users')->insert($data);
    }
}
