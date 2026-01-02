<?php
/**
 * Seeder data awal user & role
 * Dibuat oleh : Nalla Prayadita
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Staf',
            'email' => 'staf@mail.com',
            'password' => bcrypt('password'),
            'role' => 'staff'
        ]);
    }
}
