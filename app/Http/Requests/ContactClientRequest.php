<?php

namespace productosboca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactClientRequest extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required',
            'phone' => 'required|max:20',
            'mensaje' => 'required|max:200',
        ];
    }
}
