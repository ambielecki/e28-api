<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiBeerRequest extends FormRequest {
    // returns a 422 response if it fails validation

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => 'string|required',
            'style' => 'nullable|string',
            'recipe' => 'nullable|string',
            'brew_notes.*' => 'nullable|string',
            'tasting_notes.*' => 'nullable|string',
            'original_gravity' => 'nullable|numeric',
            'final_gravity' => 'nullable|numeric',
            'og_temperature' => 'nullable|numeric',
            'fg_temperature' => 'nullable|numeric',
            'primary_fermentation_start' => 'required|date',
            'primary_fermentation_end' => 'nullable|date',
            'secondary_fermentation_end' => 'nullable|date',
            'bottling' => 'nullable|date',
            'rating' => 'nullable|integer',
        ];
    }
}
