<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        switch($this->method()){
            case 'POST' : {
                return [
                    'email' => 'required|unique:users|email|between:5,255',
                    'name' => 'required|alpha|max:255',
                    'surname' => 'required|alpha|max:255',
                    'password' => 'confirmed'
                ];
            }
            default : break;
        }
        return [
            //
        ];
    }
}
