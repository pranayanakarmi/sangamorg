<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Seed three example users with different roles
        DB::table('users')->insertOrIgnore([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'role' => 'super_admin',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Normal User',
                'email' => 'user@example.com',
                'role' => 'user',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
