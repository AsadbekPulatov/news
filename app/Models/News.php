<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "text",
        "img",
        "author",
        "category",
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function scopeFilter(Builder $query, $params)
    {
        if (isset($params['author'])) {
            $query->where('author', $params['author']);
        }
        if (isset($params['category'])) {
            $query->whereHas('category', function ($q) use ($params){
                return $q->where('slug','LIKE', '%'.$params['category'].'%');
            });
        }
        if (isset($params['search'])) {
            $text = $params['search'];
            $query->where('title', 'LIKE', '%' . $text . '%')
                ->orWhere('text', 'LIKE', '%' . $text . '%');
        }
        if (isset($params['limit'])){
            $query->paginate($params['limit']);
        }
        return $query;
    }
}
