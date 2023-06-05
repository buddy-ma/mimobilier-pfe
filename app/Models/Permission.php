<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)->orWhere('p_group', 'like', $term)->orWhere('title', 'like', $term);
        });
    }

    public function permission_menu_childe()
    {
        return $this->hasMany(AsideMenuChild::class);
    }

    public function permission_menu_parent()
    {
        return $this->hasMany(AsideMenuParent::class);
    }
}
