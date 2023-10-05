<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
        $id = $this->input('id'); 
        return [
            'name' => [
               
                'max:128',
                Rule::unique('m_teams')->ignore($id)
            ],
            'email' => [
               
                'max:128',
                'email',
                Rule::unique('m_employees')
            ],
            'gender' => 'required',
            'status' => 'required',
            'avatar' => [
                
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ],
            'salary'=>[
                'numeric'
            ],
            '*' => [
                'required',
                'avatar' => [], 
            ],
        ];
    }
}
