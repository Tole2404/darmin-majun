<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Darmin Majun',
            'email' => 'admin@darminmajun.com',
            'phone' => '087720912755',
            'role' => 'admin',
            'is_active' => true,
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Staff Darmin Majun',
            'email' => 'staff@darminmajun.com',
            'phone' => '087720912756',
            'role' => 'staff',
            'is_active' => true,
            'password' => Hash::make('staff123'),
        ]);
    }
}
