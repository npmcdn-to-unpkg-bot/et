<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionRequest extends Request
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
          'question_description' => 'unique:questions'
        ];
    }

     public function messages(){
        return [
            'question_description.unique' => 'Câu hỏi này đã tồn tại.'
        ];
    }
}
