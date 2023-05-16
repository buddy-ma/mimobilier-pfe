<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locateur extends Model
{
    use HasFactory;
    protected $fillable = [
            'cin',
            'fullname',
            'Photo',
            'Sexe',
            'Date jointe',
            'Status',
            'téléphone',
            'is_verified',
            'type_utilisateur',
            'photo_vérification'
    ];

    
}