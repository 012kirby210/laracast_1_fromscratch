<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category','author'];

    protected $guarded = ['id'];
//    protected $fillable = ['title', 'excerpt', 'body'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $searched_term) =>
        $query->where( fn($query) =>
            $query->where('title','like','%'.$searched_term.'%')
            ->orWhere('body','like','%'.$searched_term.'%')
            )
        );

        $query->when($filters['category'] ?? false, fn ($query, $searched_category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $searched_category))
        );

        $query->when($filters['author'] ?? false, fn ($query, $searched_author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $searched_author))
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
