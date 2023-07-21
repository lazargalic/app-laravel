<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname'=>'required|alpha|string|max:30',
            'lastname'=>'required|alpha|string|max:30',
            'email'=>'required|email|unique:app_users,email|max:30',
            'username'=>'required|unique:app_users,username|max:30',
            'mobile'=>'required|unique:app_users,mobile|string|max:13',
            'password'=>'required|max:30',
            'country'=>'required|exists:countries,id',
            'gender'=>'required|exists:genders,id',
        ];
    }
}
