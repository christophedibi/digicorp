<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getIndex(){
        
        $datas['client'] = Client::paginate(5);
        $data['clients'] = Client::paginate(5);

        return view('pages.back.admin.clients.lister',$data,$datas);
    }
    public function getCreate(){

        $data['clients'] = Client::All();

        return view('pages.back.admin.clients.creer',$data);
    }

    public function getEditer( Client $client){
        
        
         if($client->status == 'particulier'){
            return view('pages.back.admin.clients.editer.particulier',compact('client'));
         }else{
            return view('pages.back.admin.clients.editer.entreprise',compact('client'));
         }
    }

    public function getEditerParticulier(Client $client){
        return view('pages.back.admin.clients.editerParticulier',compact('client'));

    }

    public function postCreate(Request $request)
    {
       
    $this->validate($request, [
        'nom' => 'required|string',
        'pays' => 'required|string',
        'ville' => 'required|string',
        'commune' => 'required|string',
        'contact' => 'required|string',
        'email' => 'required|string',
        'type' => 'required|string',
        'statut'=> 'nullable|string',
        ]);


        $client = new Client();
        $client->nom = $request->nom;
        $client->status =$request->status;
        $client->type =$request->type;
        $client->pays =$request->pays;
        $client->ville =$request->ville;
        $client->commune =$request->commune;
        $client->rue =$request->rue;
        $client->contact =$request->contact;
        $client->solde =$request->solde;
        $client->email =$request->email;
        $client->save();

        if($request->statut == 'entreprise'){
            $client->site_web=$request->site_web;
            return redirect()->route('creer-contact');
        }else{
            return redirect()->route('lister-client');
        }
        
    }

        
    public function postEditer(Request $request, $id)
    {
        $client = Client::find($id);
        if($client->status == 'particulier'){
            //Post Edit de particulier
            $request->validate([
            'nom' => 'required|string',
            'pays' => 'required|string',
            'ville' => 'required|string',
            'commune' => 'required|string',
            'rue' => 'required|string',
            'contact' => 'required|string',
            'email' => 'required|string',
            'type' => 'required|string',
            ]);
            $clients = [
                'nom' => $request->nom,
                'pays' => $request->pays,
                'ville' => $request->ville,
                'rue' => $request->rue,
                'contact' => $request->contact,
                'email' => $request->email,
                'type' => $request->type,
            ];
            
            $client->update($clients);
        return redirect()->route('lister-client');
        }else{
            
           //Post Edit de entreprise
            Validator::make($request->all(),
            [
                'nom' => 'required|string|min:3',
                'pays' => 'required|string|min:3',
                'ville' => 'required|string',
                'commune' => 'required|string',
                'rue' => 'required|string',
                'contact' => ['required', 'regex:/^0[1-9][0-9]{8}$/'],
                'email' => 'required|email',
                'type' => 'required|string',
                'site_web' => 'required|string'
            ],
            [
                'required' => 'Ce champs est requis',
                'nom.min' => 'minimum 3 caractères',
                'contact.min' => 'minimum 10 chiffres',
    
                'pays.min' => 'minimum 3 caractères',
                'email' => 'format email invalide',
                'numeric' => 'format numéro invalide',
            ])->validate();
                        
            $clients = [
                'nom' => $request->nom,
                'pays' => $request->pays,
                'ville' => $request->ville,
                'rue' => $request->rue,
                'contact' => $request->contact,
                'email' => $request->email,
                'type' => $request->type,
                'site_web' => $request->site_web,
                
            ];
                $client->update($clients);
            return redirect()->route('lister-client');
    } 
    

    $client = Client::find($id);
    $client->nom = $request->nom;
    $client->save();
    return redirect()->route('getIndex')
    ->with('success','Client mise à jour avec succès');
    }

    
    public function postDelete(Request $request)
    {
      
        $client = Client::where('id','=', $request->id)->first();
        if($client){
            $client->delete();
            return redirect()->route('lister-client');
        }
        else{
            return redirect()->route('home');
        }
    }
    
}
