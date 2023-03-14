<?php

namespace App\Http\Controllers;

use App\Models\Proforma;
use App\Models\ProformaProduit;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProformaProduitController extends Controller
{
    public function edit(Proforma $proforma, Produit $produit)
    {
        $proformaProduit = ProformaProduit::where('proforma_id', $proforma->id)
            ->where('produit_id', $produit->id)
            ->firstOrFail();

        return view('proforma_produits.edit', compact('proforma', 'produit', 'proformaProduit'));
    }

    public function update(Request $request, Proforma $proforma, Produit $produit)
    {
        $proformaProduit = ProformaProduit::where('proforma_id', $proforma->id)
            ->where('produit_id', $produit->id)
            ->firstOrFail();

        $proformaProduit->quantite = $request->quantite;
        $proformaProduit->save();

        return redirect()->back()->with('message', 'Quantité modifiée avec succès.');
    }
}
