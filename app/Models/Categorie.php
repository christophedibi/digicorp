<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;


class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
