<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fournisseur = new \App\Models\Fournisseur();
        $fournisseur -> nom = "Ivoire Corporation";
        $fournisseur -> email = "thecorp@gmail.com";
        $fournisseur -> pays = "Côte d'ivoire";
        $fournisseur -> ville = "Abidjan";
        $fournisseur -> commune = "Cocoody";
        $fournisseur -> rue = "Angré 7ieme tranche Côte d'Ivoire Télécom";
        $fournisseur -> contact = "0000000000";
        $fournisseur -> status = "entreprise";

        $fournisseur -> save();
        
        $fournisseur = new \App\Models\Fournisseur();
        $fournisseur -> nom = "Afrique Média";
        $fournisseur -> email = "afriquemedia@gmail.com";
        $fournisseur -> pays = "Côte d'Ivoire";
        $fournisseur -> ville = "Abidjan";
        $fournisseur -> commune = "Cocoody";
        $fournisseur -> contact = "222222222";
        $fournisseur -> status = "entreprise";
        // $fournisseur -> site_web = "siteweb.fournisseur.com";

        $fournisseur -> save();   

        $fournisseur = new \App\Models\Fournisseur();
        $fournisseur -> nom = "ivoire Technologie";
        $fournisseur -> email = "ivoiretech@gmail.com";
        $fournisseur -> pays = "Côte d'Ivoire";
        $fournisseur -> ville = "Abidjan";
        $fournisseur -> commune = "Cocoody";
        $fournisseur -> rue = "Acardes";
        $fournisseur -> contact = "3333333333";
        $fournisseur -> status = "entreprise";
        // $fournisseur -> site_web = "siteweb.fournisseur.com";

        $fournisseur -> save();  
    }
}
