<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePistasRequest extends FormRequest
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
            'deporte_id' => [
                'required', 
                'integer', 
                'exists:deportes,id', 
                'unique:pistas,deporte_id'
            ],
            'numero' => [
                'required',
                'integer',
                'unique:pistas,numero'
            ],
        ];
    }
}
