<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FournisseurController extends Controller
{
    public function getIndex(){
        
        $datas['fournisseur'] = Fournisseur::paginate(5);
        $data['fournisseurs'] = Fournisseur::paginate(5);

        return view('pages.back.admin.fournisseurs.lister',$data,$datas);
    }
    public function getCreate(){

        $data['fournisseurs'] = Fournisseur::All();

        return view('pages.back.admin.fournisseurs.creer',$data);
    }

    public function getEditer( Fournisseur $fournisseur){
        
        
         if($fournisseur->status == 'particulier'){
            return view('pages.back.admin.fournisseurs.editer.particulier',compact('fournisseur'));
         }else{
            return view('pages.back.admin.fournisseurs.editer.entreprise',compact('fournisseur'));
         }
    }

    public function getEditerParticulier(Fournisseur $fournisseur){
        return view('pages.back.admin.fournisseurs.editerParticulier',compact('fournisseur'));

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
        'status'=> 'required|string',
        ]);
        
        
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $request->nom;
        $fournisseur->status =$request->status;
        $fournisseur->pays =$request->pays;
        $fournisseur->ville =$request->ville;
        $fournisseur->commune =$request->commune;
        $fournisseur->rue =$request->rue;
        $fournisseur->contact =$request->contact;
        $fournisseur->email =$request->email;
        $fournisseur->solde =$request->solde;
        $fournisseur->save();

        if($request->statut == 'entreprise'){
            $fournisseur->site_web=$request->site_web;
            echo '<script type="text/javascript">alert("YOUR MESSAGE")</script>';

        }else{
            return redirect()->route('lister-fournisseur');
        }
        
    }

        
    public function postEditer(Request $request, $id)
    {
        $fournisseur = Fournisseur::find($id);
        if($fournisseur->status == 'particulier'){
            //Post Edit de particulier
            $request->validate([
            'nom' => 'required|string',
            'pays' => 'required|string',
            'ville' => 'required|string',
            'commune' => 'required|string',
            'contact' => 'required|string',
            'email' => 'required|string',
            ]);
            $fournisseurs = [
                'nom' => $request->nom,
                'pays' => $request->pays,
                'ville' => $request->ville,
                'rue' => $request->rue,
                'contact' => $request->contact,
                'email' => $request->email,
            ];
            
            $fournisseur->update($fournisseurs);
        return redirect()->route('lister-fournisseur');
        }else{
            
           //Post Edit de entreprise
            Validator::make($request->all(),
            [
                'nom' => 'required|string|min:3',
                'pays' => 'required|string|min:3',
                'ville' => 'required|string',
                'commune' => 'required|string',
                'contact' => 'required',
                'email' => 'required|email',
            ],
            [
                'required' => 'Ce champs est requis',
                'nom.min' => 'minimum 3 caractères',
                'contact.min' => 'minimum 10 chiffres',
    
                'pays.min' => 'minimum 3 caractères',
                'email' => 'format email invalide',
                'numeric' => 'format numéro invalide',
            ])->validate();
                        
            $fournisseurs = [
                'nom' => $request->nom,
                'pays' => $request->pays,
                'ville' => $request->ville,
                'rue' => $request->rue,
                'contact' => $request->contact,
                'email' => $request->email,
                'site_web' => $request->site_web,
                
            ];
                $fournisseur->update($fournisseurs);
            return redirect()->route('lister-fournisseur');
    } 
        $fournisseur = Fournisseur::find($id);
        $fournisseur->nom = $request->nom;
        $fournisseur->save();
        
    return redirect()->route('getIndex')
        ->with('success','Fournisseur mise à jour avec succès');
        }

    
    public function postDelete(Request $request)
    {
      
        $fournisseur = Fournisseur::where('id','=', $request->id)->first();

        if($fournisseur){
            $fournisseur->delete();
            return redirect()->route('lister-fournisseur');
        }else{
            return redirect()->route('home');
        }
    }
    
}