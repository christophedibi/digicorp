<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ContactEntrepriseClient;
use App\Models\ContactEntrepriseFournisseur;
use App\Models\Fournisseur;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::count();
        $contactsClients = ContactEntrepriseClient::count();
        $contactsFournisseurs = ContactEntrepriseFournisseur::count();
        $contacts = $contactsClients + $contactsFournisseurs;
        $fournisseurs = Fournisseur::count();
        $prestataires = Fournisseur::count();


        // $artistes = User::where('type', '=', 'artiste')->count();

        // $visiteurs = User::where('type', '=', 'visiteurs')->count();

        // $corporates = Corporate::count();

        
        return view('pages.back.admin.index',compact('clients','contacts','fournisseurs','prestataires'));
    }
}
