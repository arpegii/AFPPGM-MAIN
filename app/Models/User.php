<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',          // readonly, but still fillable if needed
        'password',
        'phone_number',
        'birthdate',
        'address',
        'city',
        'profile_picture', // also include this if you want to update it via mass assignment
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthdate' => 'date', // cast birthdate to date automatically
        ];
    }

    public function documents()
    {
        return $this->hasMany(\App\Models\Document::class);
    }
}
