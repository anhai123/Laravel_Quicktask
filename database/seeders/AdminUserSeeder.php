<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'first_name' => 'Le Huy',
            'last_name' => 'Hai Anh',
            'email' => 'lehuyhaianh0808@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('abc12345'),
            'remember_token' => null,
            'is_admin' => true,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
