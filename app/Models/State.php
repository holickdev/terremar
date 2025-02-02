<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'country_id',
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

    public function municipality()
    {
        return $this->hasMany(Municipality::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
