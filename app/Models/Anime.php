<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anime extends Model
{
    use HasFactory;

    protected $table = "animes";

    protected $fillable = [
        "title",
        'slug',
        "image",
        "description",
        "type",
        "studios",
        "date_aired",
        "status",
        "genres",
        "duration",
        "quality",
        "total_views",
    ];

    protected $with = [
        'comments',
        'viewers',
        'episodes',
        'genres',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'anime_id', 'id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'anime_user');
    }

    public function viewers()
    {
        return $this->belongsToMany(User::class, 'anime_user_views');
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class, 'anime_id', 'id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'anime_genre');
    }

    public function scopeFilter(Builder $query, array $filters): void {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where('title', 'like', '%'.$search.'%');
        });
    }
}