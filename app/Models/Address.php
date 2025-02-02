<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'point_reference',
        'parish_id',
        'state',
        'municipality',
        'parish',
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

    public function address()
    {
        return $this->hasMany(Property::class, 'id');
    }

    public function parish()
    {
        return $this->belongsTo(Parish::class);
    }

    // Accesor para el nombre del municipio
    public function getCityAttribute()
    {
        return $this->parish->municipality->name ?? null;
    }

    // Accesor para el nombre del municipio
    public function getMunicipalityAttribute()
    {
        return $this->parish->municipality->name ?? null;
    }

    // Accesor para el nombre del estado
    public function getStateAttribute()
    {
        return $this->parish->municipality->state->name ?? null;
    }

    // Accesor para el nombre del pais
    public function getCountryAttribute()
    {
        return $this->parish->municipality->state->country->name ?? null;
    }

    public static function createNormalize(array $data){

        // Insertar u obtener el país (sin relación)
        $country = Country::firstOrCreate(['name' => $data['country']]);

        // Insertar o obtener el estado (relacionado con el país)
        $state = State::firstOrCreate(
            ['name' => $data['state']],
            ['country' => $country->id]
        );

        // Insertar o obtener el municipio (relacionado con el estado)
        $municipality = Municipality::firstOrCreate(
            ['name' => $data['municipality']],
            ['state_id' => $state->id]
        );

        // Insertar o obtener la parroquia (relacionada con el municipio)
        $parish = Parish::firstOrCreate(
            ['name' => $data['parish']],
            ['municipality_id' => $municipality->id]
        );

        // Insertar o obtener la dirección (relacionada con la parroquia)
        $address = Address::firstOrCreate(
            ['point_reference' => $data['point_reference']],
            ['parish_id' => $parish->id]
        );

        return $address;
    }

    public static function updateNormalize(array $data){

        // Insertar u obtener el país (sin relación)
        $country = Country::firstOrCreate(['name' => $data['country']]);

        // Insertar o obtener el estado (relacionado con el país)
        $state = State::firstOrCreate(
            ['name' => $data['state'],
            'country' => $country->id]
        );

        // Insertar o obtener el municipio (relacionado con el estado)
        $municipality = Municipality::updateOrCreate(
            ['name' => $data['municipality']],
            ['state_id' => $state->id]
        );

        // Insertar o obtener la parroquia (relacionada con el municipio)
        $parish = Parish::updateOrCreate(
            ['name' => $data['parish']],
            ['municipality_id' => $municipality->id]
        );

        // Insertar o obtener la dirección (relacionada con la parroquia)
        $address = Address::updateOrCreate(
            ['point_reference' => $data['point_reference']],
            ['parish_id' => $parish->id]
        );

        return $address;
    }
    
}
