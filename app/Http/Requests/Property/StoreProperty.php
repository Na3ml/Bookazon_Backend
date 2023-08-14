<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class StoreProperty extends FormRequest {
    /**
    * Determine if the user is authorized to make this request.
    */

    public function authorize(): bool {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
    */

    public function rules(): array {
        return [
            //
            'property_thambnail' => 'required|image|mimes:jpg,jpeg,png,gif',
            'property_name' => 'required|min:3',
            'property_status' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string|max:2550',
            'property_size' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'Additional_fees' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'amenities_id' => 'required',
            'ptype_id' => 'required'
        ];
    }
}
