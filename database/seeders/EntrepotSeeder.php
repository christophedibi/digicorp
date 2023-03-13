<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrepotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entrepot = new \App\Models\Entrepot();
        $entrepot -> name = "GRAND BASSAM";
        $entrepot -> localisation = "Grand Bassam";
        $entrepot -> contact = "0777105200";
        $entrepot -> save();

        $entrepot = new \App\Models\Entrepot();
        $entrepot -> name = "ABATTA";
        $entrepot -> localisation = "Bingerville Abatta";
        $entrepot -> contact = "0777105200";
        $entrepot -> save();

       
    }
}
