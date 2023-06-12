<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_promoteur','id_client','id_annonce','Date',
    ];
    public function promoteur()
    {
        return $this->hasOne(User::class, 'id', 'id_prmoteur');
    }
    public function client()
    {
        return $this->hasOne(User::class, 'id', 'id_client');
    }
    public function annonce()
    {
        return $this->hasOne(Annonce::class, 'id', 'id_annonce');
    }
}