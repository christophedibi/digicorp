<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $produit = new \App\Models\Produit();
        $produit -> designation = "SAMSUNG A 80";
        $produit -> quantite = 500;
        $produit -> prix_reviens = 275000;
        $produit -> marge = 20;
        $produit -> prix_vente = 330000;

        $produit -> entrepot_id = 1;
        $produit -> marque_id = 2;
        $produit -> categorie_id = 1;
        $produit -> save();

        $produit = new \App\Models\Produit();
        $produit -> designation = "Iphone 7 Plus";
        $produit -> quantite = 124;
        $produit -> prix_reviens = 75000;
        $produit -> marge = 20;
        $produit -> prix_vente = 90000;

        $produit -> entrepot_id = 2;
        $produit -> marque_id = 1;
        $produit -> categorie_id = 1;
        $produit -> save();


    }
}
