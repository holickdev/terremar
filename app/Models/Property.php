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
