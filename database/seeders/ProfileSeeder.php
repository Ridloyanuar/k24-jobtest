<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->truncate();

        DB::table('profiles')->insert([
            'user_id' => 2,
            'no_hp' => '082231821438',
            'tanggal_lahir' => '1999-01-06',
            'jenis_kelamin' => 'pria',
            'no_ktp' => '3519120601990003',
            'foto_diri' => 'foto',
        ]);
    }
}
