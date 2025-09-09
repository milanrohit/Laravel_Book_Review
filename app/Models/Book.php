<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'published_at'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder | QueryBuilder
    {
        return $query->where('title', 'like', "%{$title}%");
    }

    public function scopePopuler(Builder $query, $from = null , $to = null):Builder | QueryBuilder 
    {
        return $query->withCount([
            'reviews' => fn (Builder $q) => $this->dateRangeFilter($q,$from, $to)
        ])->orderBy('reviews_count', 'desc');
    }

    public function scopeHighlyRated(Builder $query, $from = null , $to = null): Builder | QueryBuilder
    {
        return $query->withAvg('reviews', 'rating')
        ->orderBy('reviews_avg_rating', 'desc');
    }

    public function averageRating(): float
    {
        return $this->reviews()
        ->avg('rating') ?? 0.0;
    }

    public function scopeMinReviews(Builder $query, int $minReviews): Builder | QueryBuilder
    {
        return $query->has('reviews', '>=', $minReviews);
    }

    private function dateRangeFilter(Builder $query, $from = null , $to = null)
    {
        if ($from && !$to) {
            $query->whereDate('created_at', '>=', $from);
        }
        elseif (!$from && $to) {
            $query->whereDate('created_at', '<=', $to);
        }
        elseif ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }
    }

    public function scopeWithRecentReviews(Builder $query, \Closure $interval): Builder
    {
        return $query->whereHas(
            'reviews',
            function (Builder $q) use ($interval) {
                $q->whereBetween(
                    'created_at',
                    [$interval(now()), now()]
                );
            }
        );
    }
}
