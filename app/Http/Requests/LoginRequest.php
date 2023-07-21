<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //  $niz=$this->request->all();
            //   $vrednost=md5($niz['password']);

        return [
            'email'=>'required|exists:app_users,email',
            'password'=>'required|max:30',
            //  $vrednost=>'exists:app_users,password'
        ];
    }
}
