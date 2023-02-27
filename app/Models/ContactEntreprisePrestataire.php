<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEntreprisePrestataire extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom_du_contact',
        'numero_telephone',
        'poste',
        'adresse_email',
        'prestataire_id',
        'created_at',
        'updated_at'
    ];
    public function prestataire(){
        return $this->belongsTo(Prestataire::class);
    }
}
