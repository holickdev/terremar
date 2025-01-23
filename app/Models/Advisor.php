<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advisor extends User
{
    use HasFactory;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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

    public static function getAdvisors()
    {
        return Advisor::select('id','email')->with('person:id,name,lastname,identification,phone')->withCount([
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

