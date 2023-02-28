<?php

namespace App\Http\Controllers;

use App\Models\Entrepot;
use Illuminate\Http\Request;



class EntrepotController extends Controller
{
       /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['entrepots'] = Entrepot::paginate(5);
        return view('pages.back.admin.produits.entrepots.index',$data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('pages.back.admin.produits.entrepots.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'localisation' => 'required',
            'contact' => 'required',
        ]);
        
        Entrepot::create($request->post());

        return redirect()->route('entrepots.index')->with('success','Entrepot has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Entrepot  $entrepot
    * @return \Illuminate\Http\Response
    */
    public function show(Entrepot $entrepot)
    {
        return view('pages.back.admin.produits.entrepots.index',compact('entrepot'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Entrepot  $entrepot
    * @return \Illuminate\Http\Response
    */
    public function edit(Entrepot $entrepot)
    {
        return view('pages.back.admin.produits.entrepots.edit',compact('entrepot'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Entrepot  $entrepot
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Entrepot $entrepot)
    {
        $request->validate([
            'name' => 'required',
            'localisation' => 'required',
            'contact' => 'required',
        ]);
        
        $entrepot->fill($request->post())->save();

        return redirect()->route('entrepots.index')->with('success','Entrepot Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Entrepot  $entrepots
    * @return \Illuminate\Http\Response
    */
    public function destroy(Entrepot $entrepot)
    {
        $entrepot->delete();
        return redirect()->route('entrepots.index')->with('success','Entrepot has been deleted successfully');
    }
}
