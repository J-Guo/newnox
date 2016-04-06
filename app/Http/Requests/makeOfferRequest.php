<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class makeOfferRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'price' => 'required|integer',
            'date' => 'required|date',
        ];
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages(){

        return [
            'price.required' => 'Price is required',
            'price.integer' => 'Price must be a integer',
            'date.required' => 'Date is required',
            'date.date' => 'Please input a correct date',
        ];
    }
}
