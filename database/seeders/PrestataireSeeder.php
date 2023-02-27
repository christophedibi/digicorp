<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestataireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prestataire = new \App\Models\Prestataire();
        $prestataire -> nom = "Ivoire Corporation";
        $prestataire -> email = "thecorp@gmail.com";
        $prestataire -> pays = "Côte d'ivoire";
        $prestataire -> ville = "Abidjan";
        $prestataire -> commune = "Cocoody";
        $prestataire -> rue = "Angré 7ieme tranche Côte d'Ivoire Télécom";
        $prestataire -> contact = "0000000000";
        $prestataire -> status = "entreprise";

        $prestataire -> save();
        
        $prestataire = new \App\Models\Prestataire();
        $prestataire -> nom = "Afrique Média";
        $prestataire -> email = "afriquemedia@gmail.com";
        $prestataire -> pays = "Côte d'Ivoire";
        $prestataire -> ville = "Abidjan";
        $prestataire -> commune = "Cocoody";
        $prestataire -> contact = "222222222";
        $prestataire -> status = "entreprise";
        // $prestataire -> site_web = "siteweb.prestataire.com";

        $prestataire -> save();   

        $prestataire = new \App\Models\Prestataire();
        $prestataire -> nom = "ivoire Technologie";
        $prestataire -> email = "ivoiretech@gmail.com";
        $prestataire -> pays = "Côte d'Ivoire";
        $prestataire -> ville = "Abidjan";
        $prestataire -> commune = "Cocoody";
        $prestataire -> rue = "Acardes";
        $prestataire -> contact = "3333333333";
        $prestataire -> status = "entreprise";
        // $prestataire -> site_web = "siteweb.prestataire.com";

        $prestataire -> save();  
    }
}
