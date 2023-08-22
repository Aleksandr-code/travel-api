<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TravelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'is_public' => ['boolean'],
            'name' => ['required', 'string', 'max:255', Rule::unique('travels')->ignore(auth()->user()->id)],
            'description' => ['required', 'string'],
            'number_of_days' => ['required', 'integer'],
        ];
    }
}
