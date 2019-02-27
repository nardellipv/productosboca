<?php

namespace productosboca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInformationCartRequest extends FormRequest
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
            'email' => 'required',
            'name' => 'required|max:20',
            'lastname' => 'required|max:20',
            'address' => 'required',
            'city' => 'required|max:50',
            'postalcode' => 'required|max:5',
            'phone' => 'required|max:20',
        ];
    }
}
