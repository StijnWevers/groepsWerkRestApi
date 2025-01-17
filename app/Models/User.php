<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * De toegestane velden voor mass assignment.
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'location_id',
        'role_id',
    ];

    /**
     * Velden die verborgen moeten zijn in arrays, zoals JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Velden die automatisch worden gecast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relatie met de Role (veel naar één).
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relatie met de Location (veel naar één).
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Relatie met Jobs (één naar veel).
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}

