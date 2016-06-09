<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlanceModel extends Model
{
    protected $table = 'blances';
    protected $feild = ['previous_blance', 'blance','blancescol','user_id'];
}
