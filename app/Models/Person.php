<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'person';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'lastname',
        'birthdate',
        'identification',
        'gender',
        'phone',
        'email',
        'address_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $cast = [
        'birthdate' => 'date'
    ];

    // Definir las relaciones si la tabla está relacionada con otras
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function advisor()
    {
        return $this->hasOne(User::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'owner_id');
    }

    public static function getAdvisors()
    {
        return User::with('person')
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


    public static function getOwners()
    {
        return Person::doesntHave('advisor')->withCount([
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


// Laravel Reliese
