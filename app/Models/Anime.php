<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
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
    ];

    // protected $with = [
    //     'comments',
    // ];

    public function comments(): HasMany {
        return $this->hasMany(Comment::class, 'anime_id', 'id');
    }
}
