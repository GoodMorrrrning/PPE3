<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleUser extends FormRequest
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
        $ID_PERSONNELS = $this->user;

        var_dump($ID_PERSONNELS);
		return [
            'PRENOM'=>'required|min:3|max:20|alpha',
            'NOM'=>'required|min:3|max:20|alpha',
            'email' => 'required|email|max:255|unique:PERSONNELS,email,' . $ID_PERSONNELS.',ID_PERSONNELS',
            'password'=>'nullable|min:6',
            'VILLE'=>'min:2|max:25|alpha',
            'CP'=>'numeric'
            
        ];
        
    }
}
