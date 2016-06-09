<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table = 'tests';
    protected $feild = ['test_type', 'test_timer','test_name','	test_description','test_begin_time','test_end_time','test_point','test_token','test_parameters','is_send_mail_after_test','active_flg'];
}
