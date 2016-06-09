<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositModel extends Model
{
    protected $table = 'deposits';
    protected $feild = ['deposit_amount', 'deposit_source','active_flg','user_id'];
}
