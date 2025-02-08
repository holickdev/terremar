<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Advisor;
use App\Models\Person;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdvisorUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    public function rules(): array
    {
        $userId = $this->advisor->id;
        $personId = $this->advisor->person_id; // Si existe una relación con person_id        }
        // dd($userId,$personId);
        
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'picture' => 'file|mimes:jpeg,png,jpg',
            'birthdate' => 'required|date',
            'identification' => [
                'required',
                'string',
                'max:20',
                Rule::unique('person', 'identification')->ignore($personId),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('person', 'phone')->ignore($personId),
            ],
        ];
    }
}
