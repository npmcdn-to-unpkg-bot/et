<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClassRequest extends Request
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
            'class_name' => 'unique:classes'
        ];
    }
     public function messages(){
        return [
            'class_name.unique' => 'Lớp đã tồn tại'
        ];
    }
}
