<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
        $rules = [
            'name'  => 'required',
            'batch' => 'required',
            'passing_year' => 'required|integer|digits:4|min:2001|max:'.date('Y'),
            'university_id' => 'required|exists:university_ids,number|unique:members',
            'email' => 'required|email',
            'phone' => 'required|unique:members|digits:11',
            'address' => 'required',
            'organization' => 'nullable|string',
            'designation' => 'nullable|string',
            'gender' => 'required',
            'blood_group' => 'required',
        ];

        if($this->getMethod() == "POST"){
            $rules['image'] = 'required|image';
        }elseif($this->getMethod() == "PATCH"){
            $rules['image'] = 'nullable|image';
        }

        return $rules;
    }
}
