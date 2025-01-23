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
        'addresses_id',
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
        return $this->hasOne(Address::class, 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function properties(){
        return $this->hasMany(Property::class, 'owner_id');
    }

    public static function age()
    {
        return Person::selectRaw("
            COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) < 30 THEN 1 END) AS 'twenty',
            COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 30 AND 39 THEN 1 END) AS 'therty',
            COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 40 AND 49 THEN 1 END) AS 'forty',
            COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN 50 AND 59 THEN 1 END) AS 'fifty',
            COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) >= 60 THEN 1 END) AS 'sixty'
        ")->first();
    }

    public static function getAdvisors()
    {
        return User::with('person')->withCount([
            'properties as houses' => function ($query) {
                $query->where('type', 'Casa');
            },
            'properties as apartments' => function ($query) {
                $query->where('type', 'Apartamento');
            },
            'properties as terrains' => function ($query) {
                $query->where('type', 'Terreno');
            },
            'properties as others' => function ($query) {
                $query->where('type', 'Others');
            },
        ])->get();
    }

    public static function getOwners()
    {
        return Person::doesntHave('User')->withCount([
            'properties as houses' => function ($query) {
                $query->where('type', 'Casa');
            },
            'properties as apartments' => function ($query) {
                $query->where('type', 'Apartamento');
            },
            'properties as terrains' => function ($query) {
                $query->where('type', 'Terreno');
            },
            'properties as others' => function ($query) {
                $query->where('type', 'Others');
            },
        ])->get();
    }

}


// Laravel Reliese
