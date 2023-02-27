<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactEntrepriseFournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact = new \App\Models\ContactEntrepriseFournisseur();
        $contact -> nom_du_contact = "Jun Curtis";
        $contact -> adresse_email = "juncurtis@gmail.com";
        $contact -> poste = "Hacker de garba";
        $contact -> numero_telephone = "0708070807";
        $contact -> fournisseur_id = 1;
        
        $contact -> save();

        $contact = new \App\Models\ContactEntrepriseFournisseur();
        $contact -> nom_du_contact = "Desire Yan";
        $contact -> adresse_email = "desireyann@gmail.com";
        $contact -> poste = "Hacker de Pieds";
        $contact -> numero_telephone = "0807080708";
        $contact -> fournisseur_id = 1;
        
        $contact -> save();

        $contact = new \App\Models\ContactEntrepriseFournisseur();
        $contact -> nom_du_contact = "Rez gris";
        $contact -> adresse_email = "rezgris@gmail.com";
        $contact -> poste = "Opticien";
        $contact -> numero_telephone = "070777807";
        $contact -> fournisseur_id = 2;
        
        $contact -> save();

        $contact = new \App\Models\ContactEntrepriseFournisseur();
        $contact -> nom_du_contact = "Rez Rouge";
        $contact -> adresse_email = "rezrouge@gmail.com";
        $contact -> poste = "Loveur";
        $contact -> numero_telephone = "0708070807";
        $contact -> fournisseur_id = 2;
        
        $contact -> save();

        $contact = new \App\Models\ContactEntrepriseFournisseur();
        $contact -> nom_du_contact = "Mister Robot";
        $contact -> adresse_email = "misterrobot@gmail.com";
        $contact -> poste = "Hacker Pro";
        $contact -> numero_telephone = "000000000";
        $contact -> fournisseur_id = 3;
        
        $contact -> save();
    }
}
