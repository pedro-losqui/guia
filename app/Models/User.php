<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }

    protected $fillable = [
        'name', 'email', 'password', 'status', 'type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
