<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SpotRequest extends Request
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
                    'num' => 'required|numeric',
                    'floor' => 'required|max:1',
                    'type' => 'required|in:0,1,2'
                ];
            }
            case 'PUT' : {
                return [
                    'num' => 'required|numeric|unique:spots,num,'.$id,
                    'type' => 'required|in:0,1,2'
                ];
            }
            default:
                break;
        }

        return [
            //
        ];
    }
}
