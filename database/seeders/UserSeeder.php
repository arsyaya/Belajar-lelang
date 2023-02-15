<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'nama' => 'arsya',
                'username'     => 'arsyarzv',
                'password'     => bcrypt('masyarakat'),
                'level'        => 'masyarakat',
                'tlp'          => '08123456'
            ],

            [
                'nama' => 'admin',
                'username'     => 'admin',
                'password'     => bcrypt('admin'),
                'level'        => 'admin',
                'tlp'          => 'admin'
            ],

            [
                'nama' => 'petugas',
                'username'     => 'petugas',
                'password'     => bcrypt('petugas'),
                'level'        => 'petugas',
                'tlp'          => 'petugas'
            ],

            [
                'nama' => 'masyarakat',
                'username'     => 'masyarakat',
                'password'     => bcrypt('masyarakat'),
                'level'        => 'masyarakat',
                'tlp'          => 'masyarakat'
            ]
            ];  

            foreach ($users as $key => $value) {
                User::create($value);
            }
    }
}
