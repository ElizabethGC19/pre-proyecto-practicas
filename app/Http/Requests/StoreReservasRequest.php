<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservasRequest extends FormRequest
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
            'fecha' => [
                'required', 
                'date', 
                'date_format:Y-m-d'
            ],
            'hora' => [
                'required',
                'string', 
                'date_format:H:i', 
                'regex:/^(0[8-9]|1[0-9]|2[0-2]):00$/'
            ],
            'socio_id' => [
                'required', 
                'integer',
                'exists:socios,id'
            ],
            'pista_id' => [
                'required',
                'integer',
                'exists:pistas,id'
            ],
        ];
    }
}
