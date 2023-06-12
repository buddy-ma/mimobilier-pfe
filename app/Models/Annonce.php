<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'Titre', 'type_id', 'id_promoteur', 'id_ville','images',
        'id_quartier', 'Adresse','extras','Position','surface',
        'nbr_chambres','prix','Status','is_dispo','is_sponsorised','vues'
    ];
    public function Type()
    {
        return $this->hasOne(TypeAnnonce::class, 'id', 'type_id');
    }
    public function images()
    {
        return $this->hasMany(AnnonceImage::class);
    }
    public function getFirstImage()
    {
        return $this->images()->first();
    }
}