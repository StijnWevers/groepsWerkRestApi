<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'name', 'date'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
