<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUtilityRequest extends FormRequest
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
    public function rules()
    {
        return [
            'entrance' => 'required|between:0,999999.99',
            'misc' => 'required|between:0,999999.99',
            'tuition' => 'required|between:0,999999.99',
            'books' => 'required|between:0,999999.99',
            'handbook' => 'required|between:0,999999.99',
            'id_fee' => 'required|between:0,999999.99',
            'closing' => 'required|between:0,999999.99',
            'graduation' => 'required|between:0,999999.99',
        ];
    }
}
