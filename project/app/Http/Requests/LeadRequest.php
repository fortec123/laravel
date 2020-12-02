<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
            'phone_no' => 'required|min:10|numeric|unique:leads',
            'lead_name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:leads',
            'lead_details' => 'required|min:3|max:30',
            'source_id' => 'required',
        ];
       
    }
}
