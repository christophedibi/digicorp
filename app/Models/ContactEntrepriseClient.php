<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class ContactEntrepriseClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_du_contact',
        'numero_telephone',
        'poste',
        'adresse_email',
        'client_id',
        'created_at',
        'updated_at'
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    
}
