<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function neighbourhoods()
    {
        return $this->hasMany(Neighbourhood::class);
    }
    public function hamlets()
    {
        return $this->hasMany(Hamlet::class);
    }
}
