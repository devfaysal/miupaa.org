<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
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
        //dd($this->member->id);
        $rules = [
            //Personal Info
            'title'  => 'nullable',
            'first_name'  => 'required',
            'last_name'  => 'required',
            'dob'  => 'required',
            'blood_group' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'phone' => 'required|unique:members|digits:11',
            'present_address' => 'required',
            'permanent_address' => 'required',

            //MIU Info
            'batch' => 'required',
            'passing_year' => 'required|integer|digits:4|min:2001|max:'.date('Y'),
            
            //Career Info
            'organization' => 'nullable|string',
            'designation' => 'nullable|string',
            'department' => 'nullable|string',
            'office_address' => 'nullable|string',
            'office_phone' => 'nullable|string',
            'office_email' => 'nullable|email',
            
            
        ];

        if($this->getMethod() == "POST"){
            $rules['university_id'] = 'required|exists:university_ids,number|unique:members';
            $rules['image'] = 'required|image';
        }elseif($this->getMethod() == "PATCH"){
            $rules['university_id'] = 'required|exists:university_ids,number|unique:members,university_id,'.$this->member->id;
            $rules['image'] = 'nullable|image';
        }

        return $rules;
    }
}
