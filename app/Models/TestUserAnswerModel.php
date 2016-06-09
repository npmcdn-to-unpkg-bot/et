<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestUserAnswerModel extends Model
{
    protected $table = 'test_user_answers';
    protected $feild = ['test_id', 'answer_id','user_id'];
}
