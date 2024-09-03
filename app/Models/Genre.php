<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = [
        'name',
        'slug',
    ];

    // protected $with = [
    //     'animes'
    // ];

    public function animes()
    {
        return $this->belongsToMany(Anime::class, 'anime_genre');
    }

    public function scopeFilter(Builder $query, array $filters): void {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where('name', 'like', '%'.$search.'%');
        });
    }
}