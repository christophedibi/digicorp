<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'quantite',
        'prix_unitaire',
        //Le total unitaire sera  appelé total_ht
        'total_ht',
        'client_id',
        'produit_id',
        'total',
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite', 'produit_id');
    }
    public function getProduitsInfo($produitIds)
{
    $produits = Produit::whereIn('id', $produitIds)->get();
    $produitsInfo = [];
    foreach ($produits as $produit) {
        $produitsInfo[] = [
            'id' => $produit->id,
            'designation' => $produit->designation,
            'prix_vente' => $produit->prix_vente,
            'quantite' => $produit->quantite,
            // Ajoutez d'autres informations de produit que vous souhaitez récupérer
        ];
    }
    return $produitsInfo;
}

}
