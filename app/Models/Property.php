<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'properties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'owner_id',
        'title',
        'description',
        'type',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'parkings',
        'captation_date',
        'address_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'area' => 'decimal:2',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'parkings' => 'integer',
        'captation_date' => 'date',
    ];

    public static function counter()
    {
        return Property::selectRaw("
            COUNT(*) AS total,
            COUNT(CASE WHEN type = 'Casa' THEN 1 END) AS houses,
            COUNT(CASE WHEN type = 'Apartamento' THEN 1 END) AS apartments,
            COUNT(CASE WHEN type = 'Terreno' THEN 1 END) AS terrains,
            COUNT(CASE WHEN type NOT IN ('Casa', 'Apartamento', 'Terreno') THEN 1 END) AS others
        ")->first();
    }

    public static function percent()
    {
        return Property::selectRaw("
            COUNT(*) AS total,
            COUNT(CASE WHEN captation_end >= CURDATE() THEN 1 END) AS captated,
            COUNT(CASE WHEN captation_end < CURDATE() THEN 1 END) AS discaptated,
            COUNT(CASE WHEN captation_end is NULL THEN 1 END) AS uncaptated
        ")->first();
    }

    /**
     * Relationship with Owner model.
     */
    public function owner()
    {
        return $this->belongsTo(Person::class, 'owner_id');
    }

    /**
     * Relationship with Address model.
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function advisor_property()
    {
        return $this->hasMany(UserProperty::class, 'property_id');
    }

    public function advisors()
    {
        return $this->hasManyThrough(User::class, UserProperty::class, 'property_id', 'id', 'id', 'user_id');
    }
}
