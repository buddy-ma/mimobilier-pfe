<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_opération', 'id_client', 'id_annonce', 'montant_paiement'
        , 'date_paiement', 'photo_virement',
    ];
}