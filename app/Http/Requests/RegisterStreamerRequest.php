<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStreamerRequest extends FormRequest
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
            'celendz1'=>'required|string|max:25',
            'celendz2'=>'required|string|max:25',
            'celendz3'=>'required|string|max:25',
            'cena1'=>'required|numeric|min:1|max:10000',
            'cena2'=>'required|numeric|min:1|max:10000',
            'cena3'=>'required|numeric|min:1|max:10000',
            'kategorije'=>'required|array|min:2|max:3|exists:categories,id'
        ];
    }


}
