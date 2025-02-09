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
        'id',
        'person_id',
        'email',
        'role',
        'picture',
        'password',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'user_property', 'user_id', 'property_id');
    }

    public static function getAdvisors()
    {
        return Advisor::select(['id', 'email', 'person_id'])
            ->with('person:id,name,lastname,identification,phone')
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
                    $query->whereRelation('type', function ($q) {
                        $q->whereNotIn('name', ['Casa', 'Apartamento', 'Terreno']);
                    });
                },
            ])->get();
    }
}
