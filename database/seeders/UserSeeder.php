<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id' => '4DM1N',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'no_telpon' => '08123456789',
            'jabatan' => 'Sekretaris',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'user_id' => '72190319',
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => Hash::make('mahasiswa123'),
            'role' => 'mahasiswa',
            'no_telpon' => '08123456789',
            'jabatan' => null,
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'user_id' => 'D0S3N',
            'name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'password' => Hash::make('dosen123'),
            'role' => 'dosen',
            'no_telpon' => '08123456789',
            'jabatan' => 'Dekan',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
