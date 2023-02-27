<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    use HasFactory;
    protected $fillable = [
        'nom',
        'pays',
        'ville',
        'commune',
        'rue',
        'contact',
        'email',
        'type',
        'site_web',
        'solde',
        'status',
        'created_at',
        'updated_at'
    ];
    
}

