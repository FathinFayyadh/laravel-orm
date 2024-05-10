<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'fathin fayyadh',
            'email' => 'fathinfayyadh@gmail.com',
            'password' => Hash::make('password')
        ]);

        DB::table('users')->insert([
            'name' => 'Nanda Pratama',
            'email' => 'Nanda@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
