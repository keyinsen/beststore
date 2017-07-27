<?php

namespace App\Http\Requests\Home;

use App\Http\Requests\Request;

class searchInfo extends Request
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
        		'searchValues'=>'required',
        ];
    	
    }
    public function messages()
    {
    	return [
    			'searchValues.required'=>'hehe',
    	];
    }
    
}