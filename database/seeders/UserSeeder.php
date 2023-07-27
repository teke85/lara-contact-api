<?php

namespace Database\Seeders;

use Illuminate\Support\Str;

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
        $arr = [
            [
                'name' => 'saw',
                'email' => 'saw@gmail.com',
                'password' => Hash::make(1111),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),


            ],
            [
                'name' => 'htut',
                'email' => 'htut@gmail.com',
                'password' => Hash::make(1111),

                'email_verified_at' => now(),
                'remember_token' => Str::random(10),



            ]
        ];

        User::insert($arr);
        User::factory(10)->create();
    }
}
