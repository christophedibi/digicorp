<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie = new \App\Models\Categorie();
        $categorie -> name = "MOBILES";
        $categorie -> save();

        $categorie = new \App\Models\Categorie();
        $categorie -> name = "APPAREILS";
        $categorie -> save();
    }
}
