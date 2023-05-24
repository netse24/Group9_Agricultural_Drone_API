<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDroneRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status' =>false, 'message' =>$validator->errors()],412));
    }
    public function rules(): array
    {
        return [
            'drone_name' => 'required|string',
            'battery' => 'required|string',
            'payload' => 'required|string',
            'farmer_id' => 'required|integer',
            'location_id' => 'required|integer',
        ];
    }
}
