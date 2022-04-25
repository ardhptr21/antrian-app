<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = ['order', 'time', 'activity_id'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
