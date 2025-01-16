<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Geef aan welke velden "mass assignable" zijn
    protected $fillable = [
        'title',
        'description',
        'company_name',
        'location',
        'posted_date',
    ];
}
