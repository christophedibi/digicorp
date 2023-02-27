<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fournisseur;


class ContactEntrepriseFournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_du_contact',
        'numero_telephone',
        'poste',
        'adresse_email',
        'fournisseur_id',
        'created_at',
        'updated_at'
    ];
    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class);
    }
}
