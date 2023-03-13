<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantite',
        'prix_unitaire',
        //Le total unitaire sera  appelé total_ht
        'total_ht',
        'client_id',
        'produit_id',
        'total',
    ];
}
