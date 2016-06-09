<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashflowModel extends Model
{
    protected $table = 'cashflows';
    protected $feild = ['amount', 'cashflow_type','active_flg'];
}
