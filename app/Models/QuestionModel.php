<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $feild = ['question_description', 'question_explaination','active_flag','class_id','active_flg','user_id','chapter_id','domain_id','level_id','delete_flg'];
}
