<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'ownerState' => 'required|string|max:100',
            'ownerMunicipality' => 'required|string|max:100',
            'ownerParish' => 'required|string|max:100',
            'ownerPoint_reference' => 'required|string|max:255',
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'birthdate' => 'required|date',
            'identification' => 'required|string|max:20',
            'gender' => 'required|string|in:male,female,other',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:person,email',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'municipality' => 'required|string|max:100',
            'parish' => 'required|string|max:100',
            'point_reference' => 'nullable|string|max:255',
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
            'media.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi|max:5120', // Cada archivo debe ser imagen o video, máx. 5MB
        ];
    }
}
