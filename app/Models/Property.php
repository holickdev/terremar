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
        'type_id',
        'trade_id',
        'social_class',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'parkings',
        'captation_start',
        'captation_end',
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
        return Property::join('types', 'properties.type_id', '=', 'types.id')
            ->selectRaw("
                COUNT(*) AS total,
                COUNT(CASE WHEN types.name = 'Casa' THEN 1 END) AS houses,
                COUNT(CASE WHEN types.name = 'Apartamento' THEN 1 END) AS apartments,
                COUNT(CASE WHEN types.name = 'Terreno' THEN 1 END) AS terrains,
                COUNT(CASE WHEN types.name NOT IN ('Casa', 'Apartamento', 'Terreno') THEN 1 END) AS others
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

    public static function liquid()
    {
        return Property::join('types', 'properties.type_id', '=', 'types.id')
            ->selectRaw("
                SUM(CASE WHEN types.name = 'Casa' THEN price ELSE 0 END) AS houses,
                SUM(CASE WHEN types.name = 'Apartamento' THEN price ELSE 0 END) AS apartments,
                SUM(CASE WHEN types.name = 'Terreno' THEN price ELSE 0 END) AS terrains,
                SUM(CASE WHEN types.name NOT IN ('Casa', 'Apartamento', 'Terreno') THEN price ELSE 0 END) AS others
            ")->first();
    }
    


    /**
     * Relationship with Owner model.
     */
    public function owner()
    {
        return $this->belongsTo(Person::class, 'owner_id');
    }

    public function trade()
    {
        return $this->belongsTo(Trade::class, 'trade_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
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

    public function media()
    {
        return $this->hasMany(Media::class, 'property_id');
    }

    public function advisors()
    {
        return $this->hasManyThrough(User::class, UserProperty::class, 'property_id', 'id', 'id', 'user_id');
    }
}
