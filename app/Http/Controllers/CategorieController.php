<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function index()
    {
        $data['categories'] = Categorie::paginate(5);
        return view('pages.back.admin.produits.categories.index',$data);
    }
   
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Categorie::create($request->post());
   
        return redirect()->back()->with('add-product','la catégorie a été crée avec succès.');
    }
   
   
    public function update(Request $request, $id)
   
    {
        $a=Categorie::findOrFail($id);
        
        $a->fill($request->post())->save();
   
        
        return redirect()->back()->with('add-product','la catégorie a été mise à jour avec succès !');
       
    }
   
   
    public function destroy(Categorie $categorie)
    {
        dd($categorie->id);
        $categorie->delete();

        return redirect()->back()->with('add-product','la catégorie a été supprimé avec succès');
    }
   }
   