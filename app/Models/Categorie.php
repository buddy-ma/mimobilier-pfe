<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use SoftDeletes;

    protected $fillable = ['parent_id', 'name'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_has_categories');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function children()
    {
        return $this->hasMany(Categorie::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Categorie::class, 'parent_id');
    }
}