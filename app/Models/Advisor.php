<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advisor extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advisors';

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
        return $this->belongsTo(Address::class, 'addresses_id');
    }

    public function property_users()
    {
        return $this->hasMany(UserProperty::class, 'advisor_id');
    }

    public function properties()
    {
        return $this->hasManyThrough(Property::class, UserProperty::class, 'user_id', 'id', 'id', 'advisor_id');
    }
}

