<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Kobra',
            'email' => 'admin@kobra.com',
            'password' => Hash::make('admin123'), // password default
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
