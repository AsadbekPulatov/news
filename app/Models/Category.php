<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug"];

    public function news(){
        return $this->hasMany(News::class, 'category', 'id');
    }

    public function scopeFilter(Builder $query, $params)
    {
        if (isset($params['search'])) {
            $text = $params['search'];
            $query->where('name', 'LIKE', '%' . $text . '%')
                ->orWhere('slug', 'LIKE', '%' . $text . '%');
        }
        if (isset($params['limit'])){
            $query->paginate($params['limit']);
        }
        return $query;
    }
}
