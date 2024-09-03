<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';

    protected $fillable = [
        'anime_id',
        'episode_name',
        'video',
        'thumbnail',
    ];

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class, 'anime_id', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void {
        $query->when($filters['anime'] ?? false, function($query, $anime) {
            $query->whereHas('anime', fn ($query) => $query->where('slug', $anime)
            );
        });
    }
}
