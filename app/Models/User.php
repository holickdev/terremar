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
        'id',
        'person_id',
        'email',
        'role',
        'picture',
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
        return $this->role->name === self::ROLE_ADMIN;
    }

    public function isGerente()
    {
        return $this->role->name === self::ROLE_GERENTE;
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function property_users()
    {
        return $this->hasMany(UserProperty::class, 'user_id');
    }

    public static function getAdvisors()
    {
        return Advisor::with('person:id,name,lastname,identification,phone')
            ->withCount([
                'properties as houses' => function ($query) {
                    $query->whereRelation('type', 'name', 'Casa');
                },
                'properties as apartments' => function ($query) {
                    $query->whereRelation('type', 'name', 'Apartamento');
                },
                'properties as terrains' => function ($query) {
                    $query->whereRelation('type', 'name', 'Terreno');
                },
                'properties as others' => function ($query) {
                    $query->whereRelation('type', 'name', 'Others');
                },
            ])->get();
    }
}
