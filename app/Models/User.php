<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    const ROLE_ADMIN = 'admin';
    const ROLE_GERENTE = 'gerente';
    const ROLE_USER = 'user';

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isGerente()
    {
        return $this->role === self::ROLE_GERENTE;
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function property_users()
    {
        return $this->hasMany(UserProperty::class, 'user_id');
    }

    public function faq()
    {
        return $this->hasMany(Faq::class, 'user_id');
    }

    public function properties()
    {
        return $this->hasManyThrough(Property::class, UserProperty::class, 'user_id', 'id', 'id', 'property_id');
    }

}
