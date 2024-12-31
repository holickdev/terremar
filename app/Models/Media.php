<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Media extends Model
{
    //

    use HasFactory;

    protected $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'url',
        'type',
        'property_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Aquí podrías agregar campos que deseas ocultar, si es necesario
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Si tienes algún campo que necesite conversión, puedes definirlo aquí
            // Por ejemplo, si tuvieras algún campo datetime o booleano
        ];
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

}
