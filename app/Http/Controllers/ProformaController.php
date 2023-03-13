<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Client;
use App\Models\Proforma;

class ProformaController extends Controller
{

    public function index()
    {
        $datas['produits'] = Produit::Get();
        $datas['clients'] = Client::Get();
        $datas['proformas'] = Proforma::Get();
   
        return view('pages.back.admin.proformas.index',$datas);
    }
   
   
    public function store(Request $request)
    {
        dd($request);
        // $request->validate([
        //     'designation' => 'required',
        // ]);
        
        
        // Produit::create($request->post());
   
        // return redirect()->back()->with('message','Produit a été crée avec succès.');
    }
   
    public function show(Proforma $proforma)
    {
        // return view('pages.back.admin.proformas.index',compact('proforma'));
    }
   
   
    public function update(Request $request, $id)
   
    {
        // $a=Produit::findOrFail($id);
        
        // $a->fill($request->post())->save();
   
        
        // return redirect()->back()->with('message','Article mis à jour avec succès !');
       
    }
   
   
   
    public function destroy(Proforma $proforma)
    {
        $proforma->delete();
        return redirect()->route('proformas.index')->with('message','Produit a été supprimé avec succès');
    }
   }