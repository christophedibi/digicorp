<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marque = new \App\Models\Marque();
        $marque -> name = "IPHONE";
        $marque -> save();

        $marque = new \App\Models\Marque();
        $marque -> name = "SAMSUNG";
        $marque -> save();
    }
}
