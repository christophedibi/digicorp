<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

 public function index()
 {
     $data['produits'] = Produit::paginate(5);
     return view('pages.back.admin.produits.index',$data);
 }

 public function create()
 {
     return view('pages.back.admin.produits.create');
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

     return redirect()->route('produits.index')->with('success','Produit a été crée avec succès.');
 }

 public function show(Produit $produit)
 {
     return view('pages.back.admin.produits.index',compact('produit'));
 }

 public function edit(Produit $produit)
 {
     return view('pages.back.admin.produits.edit',compact('produit'));
 }

 public function update(Request $request, Produit $produit)
 {
     $request->validate([
        'designation' => 'required',
     ]);
     
     $produit->fill($request->post())->save();

     return redirect()->route('produits.index')->with('success','Produit a été mis à jour avec succès');
 }


 public function destroy(Produit $produit)
 {
     $produit->delete();
     return redirect()->route('produits.index')->with('success','Produit a été supprimé avec succès');
 }
}

