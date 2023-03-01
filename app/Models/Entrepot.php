<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;


class Entrepot extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name',
        'localisation',
        'contact',
    ];
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
