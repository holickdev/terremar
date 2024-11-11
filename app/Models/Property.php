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
        'title',
        'description',
        'type',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'parkings',
        'captation_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:3',
        'area' => 'decimal:3',
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
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    /**
     * Relationship with Address model.
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address_fk');
    }
}
