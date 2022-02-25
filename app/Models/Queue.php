<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'village',
        'neighbourhood',
        'hamlet',
        'vaccine',
        'order',
        'nik'
    ];

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['village'] ?? false, function (Builder $query, $village) {
            return $query->where('village', $village);
        });

        $query->when($filters['vaccine'] ?? false, function (Builder $query, $vaccine) {
            return $query->where('vaccine', $vaccine);
        });

        $query->when($filters['date'] ?? false, function (Builder $query, $date) {
            return $query->whereDate('created_at', $date);
        });
    }

    public function scopeToday(Builder $query)
    {
        return $query->whereDate('created_at', today());
    }
}
