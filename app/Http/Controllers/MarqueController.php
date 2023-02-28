<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
   
   /* Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['marques'] = Marque::paginate(5);
        return view('pages.back.admin.produits.marques.index',$data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('pages.back.admin.produits.marques.create');
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
        ]);
        
        Marque::create($request->post());

        return redirect()->route('marques.index')->with('success','Marque has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Marque  $marque
    * @return \Illuminate\Http\Response
    */
    public function show(Marque $marque)
    {
        return view('pages.back.admin.produits.marques.index',compact('marque'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Marque  $marque
    * @return \Illuminate\Http\Response
    */
    public function edit(Marque $marque)
    {
        return view('pages.back.admin.produits.marques.edit',compact('marque'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Marque  $marque
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Marque $marque)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $marque->fill($request->post())->save();

        return redirect()->route('marques.index')->with('success','Marque Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Marque  $marques
    * @return \Illuminate\Http\Response
    */
    public function destroy(Marque $marque)
    {
        $marque->delete();
        return redirect()->route('marques.index')->with('success','Marque has been deleted successfully');
    }

}
