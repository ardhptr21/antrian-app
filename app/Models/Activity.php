<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'quota',
        'batch',
        'is_open',
    ];

    public function scopeToday(Builder $query)
    {
        return $query->whereDate('created_at', today());
    }
}
