<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'quantite',
        'prix_revient',
        'marge',
        'prix_vente',
        'code',
    ];
}
