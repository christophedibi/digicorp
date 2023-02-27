<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestataire;
use Illuminate\Support\Facades\Validator;

class PrestataireController extends Controller
{
    public function getIndex(){
        
        $datas['prestataire'] = Prestataire::paginate(5);
        $data['prestataires'] = Prestataire::paginate(5);

        return view('pages.back.admin.prestataires.lister',$data,$datas);
    }
    public function getCreate(){

        $data['prestataires'] = Prestataire::All();

        return view('pages.back.admin.prestataires.creer',$data);
    }

    public function getEditer( Prestataire $prestataire){
        
         if($prestataire->status == 'particulier'){
            return view('pages.back.admin.prestataires.editer.particulier',compact('prestataire'));
         }else{
            return view('pages.back.admin.prestataires.editer.entreprise',compact('prestataire'));
         }
    }

    public function getEditerParticulier(Prestataire $prestataire){
        return view('pages.back.admin.prestataires.editerParticulier',compact('prestataire'));

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
        
        
        $prestataire = new Prestataire();
        $prestataire->nom = $request->nom;
        $prestataire->status =$request->status;
        $prestataire->pays =$request->pays;
        $prestataire->ville =$request->ville;
        $prestataire->commune =$request->commune;
        $prestataire->rue =$request->rue;
        $prestataire->contact =$request->contact;
        $prestataire->email =$request->email;
        $prestataire->solde =$request->solde;
        $prestataire->save();

        if($request->statut == 'entreprise'){
            $prestataire->site_web=$request->site_web;
            echo '<script type="text/javascript">alert("YOUR MESSAGE")</script>';

        }else{
            return redirect()->route('lister-prestataire');
        }
        
    }

        
    public function postEditer(Request $request, $id)
    {
        $prestataire = Prestataire::find($id);
        if($prestataire->status == 'particulier'){
            //Post Edit de particulier
            $request->validate([
            'nom' => 'required|string',
            'pays' => 'required|string',
            'ville' => 'required|string',
            'commune' => 'required|string',
            'contact' => 'required|string',
            'email' => 'required|string',
            ]);
            $prestataires = [
                'nom' => $request->nom,
                'pays' => $request->pays,
                'ville' => $request->ville,
                'rue' => $request->rue,
                'contact' => $request->contact,
                'email' => $request->email,
            ];
            
            $prestataire->update($prestataires);
        return redirect()->route('lister-prestataire');
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
                
                $prestataires = [
                    'nom' => $request->nom,
                    'pays' => $request->pays,
                    'ville' => $request->ville,
                    'rue' => $request->rue,
                    'contact' => $request->contact,
                    'email' => $request->email,
                    'site_web' => $request->site_web,
                    
                ];
                
                $prestataire->update($prestataires);
            return redirect()->route('lister-prestataire');
    } 
        $prestataire = Prestataire::find($id);
        $prestataire->nom = $request->nom;
        $prestataire->save();
        
    return redirect()->route('getIndex')
        ->with('success','prestataire mise à jour avec succès');
        }

    
    public function postDelete(Request $request)
    {
      
        $prestataire = Prestataire::where('id','=', $request->id)->first();

        if($prestataire){
            $prestataire->delete();
            return redirect()->route('lister-prestataire');
        }else{
            return redirect()->route('home');
        }
    }
    
}