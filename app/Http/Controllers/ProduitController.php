<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Entrepot;



use Illuminate\Http\Request;

class ProduitController extends Controller
{

 public function index()
 {
     $data['produits'] = Produit::paginate(5);
     $datas['categories'] = Categorie::Get();
     $datas['marques'] = Marque::Get();
     $datas['entrepots'] = Entrepot::Get();

     return view('pages.back.admin.produits.index',$data,$datas);
 }


 public function store(Request $request)
 {
     $request->validate([
         'designation' => 'required',
     ]);
     if(isset($request->prix_revient,$request->marge))
     {
        $request->prix_vente = $request->prix_revient + ($request->prix_revient*$request->marge)/100;
     }
     
     Produit::create($request->post());

     return redirect()->back()->with('add-product','Produit a été crée avec succès.');
 }

 public function show(Produit $produit)
 {
     return view('pages.back.admin.produits.index',compact('produit'));
 }


 public function update(Request $request, $id)

 {
     $a=Produit::findOrFail($id);
     
     $a->fill($request->post())->save();

     
     return redirect()->back()->with('add-product','Article mis à jour avec succès !');
    
 }



 public function destroy(Produit $produit)
 {
     $produit->delete();
     return redirect()->route('produits.index')->with('add-product','Produit a été supprimé avec succès');
 }
}

