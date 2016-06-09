<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerModel extends Model
{
    protected $table = 'answers';
    protected $feild = ['answer_description', 'answer_axplaination','answer_isright','answer_position','active_flg','question_id','delete_flg'];
}
