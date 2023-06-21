<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes, Likeable;

    protected static function booted()
    {
        if (Request::is('admin') || Request::is('admin/*') || Auth::guard() == 'web') {
            static::addGlobalScope('adminScope', function (Builder $builder) {
                if (!Auth::guard('web')->user()->hasRole('Administrator')) {
                    $builder->where('user_id', Auth::id());
                }
            });
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'blog_has_categories');
    }

    public function conseilscategories()
    {
        return $this->belongsToMany(ConseilCategory::class, 'blog_has_conseils_categories');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('blogs.title', 'like', $term)
                ->orWhere('blogs.subtitle', 'like', $term)
                ->orWhere('blogs.text', 'like', $term)
                ->orWhere('blogs.tags', 'like', $term);
        });
    }

    public function scopeTags($query, $count = 10)
    {
        $tags = $query->pluck('tags')->toArray();
        $tags = implode(',', $tags);
        $tags = explode(',', $tags);
        $tags = array_filter($tags);
        return array_slice($tags, 0, $count);
    }
}