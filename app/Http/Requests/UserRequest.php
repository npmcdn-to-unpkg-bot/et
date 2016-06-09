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
        return [
          'user_name' => 'unique:users',
          'user_email' => 'email|unique:users',
        ];
    }

     public function messages(){
        return [
            'user_name.unique' => 'Tên đăng nhập đã tồn tại.',
            'user_email.email' => 'Email bạn nhập chưa đúng định dạng.',
            'user_email.unique' => 'Email này đã tồn tại.'
        ];
    }
}
