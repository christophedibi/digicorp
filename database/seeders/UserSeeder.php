<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new \App\Models\User();
        $user -> name = "admin";
        $user -> email = "admin@admin.com";
        $user -> password = bcrypt('admin');
        $user -> updated_at = now();
        $user -> created_at = now();
        $user -> save();

    }
}
