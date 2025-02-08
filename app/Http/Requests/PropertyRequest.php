<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Obtén el ID del propietario actual
        $ownerId = $this->property->owner->id ?? null;
        // dd($this);


        return [
            'ownerCountry' => 'required|string|max:100',
            'ownerState' => 'required|string|max:100',
            'ownerMunicipality' => 'required|string|max:100',
            'ownerParish' => 'required|string|max:100',
            'ownerPoint_reference' => 'required|string|max:255',
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'birthdate' => 'required|date',
            'identification' => [
                'required',
                'string',
                'max:20',
                Rule::unique('person', 'identification')->ignore($ownerId),
            ],
            'gender' => 'required|string|in:male,female,other',
            'phone' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('person', 'email')->ignore($ownerId),
            ],
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'municipality' => 'required|string|max:100',
            'parish' => 'required|string|max:100',
            'point_reference' => 'nullable|string|max:255',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'parkings' => 'required|integer|min:0',
            'type' => 'required|string|max:50',
            'trade' => 'required|string|max:50',
            'social_class' => 'required|string|max:50',
            'description' => 'required|string|max:2000',
            'captation_start' => 'nullable|date',
            'captation_end' => 'nullable|date|after_or_equal:captation_start',
            'advisorIdentifications' => 'required|array',
            'advisorIdentifications.*' => 'exists:person,identification',
            'uploadMedia' => 'sometimes:nullable|array',
            'uploadMedia.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,avi|max:5120', // Cada archivo debe ser imagen o video, máx. 5MB
            'deleteMedia' => 'sometimes|nullable|array',
            'deleteMedia.*' => 'nullable|integer|exists:media,id', // Asegúrate de que los IDs existan en la tabla `media`
        ];
    }
}
