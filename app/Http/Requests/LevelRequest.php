<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LevelRequest extends Request
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
            'level_name' => 'unique:levels'
        ];
    }
     public function messages(){
        return [
            'level_name.unique' => 'Cấp độ đã tồn tại'
        ];
    }
}
