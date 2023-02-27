<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new \App\Models\Client();
        $client -> nom = "Eburnie Corporation";
        $client -> email = "eburnie@gmail.com";
        $client -> pays = "Côte d'ivoire";
        $client -> ville = "Abidjan";
        $client -> commune = "Cocoody";
        $client -> contact = "1111111111";
        $client -> type = "distributeur";
        $client -> status = "entreprise";
        $client -> site_web = "siteweb.client.com";
        $client -> solde = 1500000;


        $client -> save();   

        $client = new \App\Models\Client();
        $client -> nom = "Afrique Média";
        $client -> email = "afriquemedia@gmail.com";
        $client -> pays = "Côte d'Ivoire";
        $client -> ville = "Abidjan";
        $client -> commune = "Cocoody";
        $client -> rue = "Groupement 4000 C";
        $client -> contact = "222222222";
        $client -> type = "normal";
        $client -> status = "entreprise";
        $client -> site_web = "siteweb.client.com";

        $client -> save();   

        $client = new \App\Models\Client();
        $client -> nom = "ivoire Technologie";
        $client -> email = "ivoiretech@gmail.com";
        $client -> pays = "Côte d'Ivoire";
        $client -> ville = "Abidjan";
        $client -> commune = "Cocoody";
        $client -> rue = "Acardes";
        $client -> contact = "3333333333";
        $client -> type = "revendeur";
        $client -> status = "entreprise";
        $client -> site_web = "siteweb.client.com";
        $client -> solde = 17825000;


        $client -> save();  
        
        
        
    }
}

