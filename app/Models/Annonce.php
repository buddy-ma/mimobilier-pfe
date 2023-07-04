<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable = [

        'Titre', 'type_id', 'id_promoteur', 'id_ville',
        'id_quartier', 'Adresse', 'extras', 'Position', 'surface',
        'nbr_chambres', 'prix', 'Status', 'is_dispo', 'is_sponsorised', 'vues'
    ];
    public function getFirstImage()
    {
        return $this->images()->first();
    }
    public function ville()
    {
        return $this->hasOne(Ville::class, 'id', 'id_ville');
    }
    public function Quartier()
    {
        return $this->hasOne(Quartier::class, 'id', 'id_quartier');
    }
    public function type()
    {
        return $this->belongsTo(TypeAnnonce::class, 'type_id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\AnnonceImage', 'annonce_id');
    }

    public function promoteur()
    {
        return $this->belongsTo(User::class, 'id_promoteur');
    }
}
