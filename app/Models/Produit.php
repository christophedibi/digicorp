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
        'entrepot_id',
        'categorie_id',
        'marque_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (is_null($model->prix_revient)) {
                $model->prix_revient = 0;
            }
           
            if (is_null($model->marge)) {
                $model->marge = 0;
            }

            $model->prix_vente = $model->prix_revient + (($model->prix_revient * $model->marge)/100);
            
        });
    }
    

    
}
