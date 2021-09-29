<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'is_admin' => 1,
            'password' => Hash::make('admin123')
        ]);

        DB::table('users')->insert([
            'name' => 'member',
            'email' => 'member@example.com',
            'is_admin' => 0,
            'password' => Hash::make('member123')
        ]);
    }
}
