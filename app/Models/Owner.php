<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'owners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
}
