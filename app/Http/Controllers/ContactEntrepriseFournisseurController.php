<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactEntrepriseFournisseur as Contact;
use App\Models\Fournisseur as Client;



class ContactEntrepriseFournisseurController extends Controller
{
    
    public function getIndex()
    {
        $datas['contact'] = Contact::first();
        $data['contacts'] = Contact::Get();
        $datas['entreprises'] = Client::where('status','=', 'entreprise')->get();

        return view('pages.back.admin.fournisseurs.contacts.lister',$datas,$data);
    }

    public function getEditer(Contact $contact)
    {
        $entreprises = Client::where('status','=', 'entreprise')->get();
        return view('pages.back.admin.fournisseurs.contacts.editer',compact('contact','entreprises'));
    }

    public function getCreate()
    {
        $data['entreprises'] = Client::Where('status', '=', "entreprise")->get();
        return view('pages.back.admin.fournisseurs.contacts.creer',$data);

    }


    public function postCreate(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'numero' => 'required',
            'poste' => 'required',
            'email' => 'required',
            'entreprise_id' => 'required',
           
            ]);

            $contact = new Contact();
            $contact->nom_du_contact = $request->nom;
            $contact->numero_telephone = $request->numero;
            $contact->poste = $request->poste;
            $contact->fournisseur_id = $request->entreprise_id;
            $contact->adresse_email = $request->email;
            //nom_du_contact	numero_telephone	poste	adresse_email
            $contact->save();

            return redirect()->route('lister-contact-fournisseur');
    }


    /**
     * Update the specified resource in storage.
     */
    public function postEditer(Request $request, Contact $contact)
    {
        
            $datas = [
                'nom_du_contact' => $request->nom_du_contact,
                'numero_telephone' => $request->numero_telephone,
                'poste' => $request->poste,
                'adresse_email' => $request->adresse_email,
                'fournisseur_id' => $request->entreprise_id,
            ];
            
            $contact->update($datas);
            
            return redirect()->route('lister-contact-fournisseur')
            ->with('success','contact mise à jour avec succès');
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function postDelete(Request $request)
    {
        $contact = Contact::where('id','=', $request->id)->first();
        $contact->delete();
        return redirect()->route('lister-contact-fournisseur');

    }
}
