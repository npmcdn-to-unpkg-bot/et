<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    protected $table = 'levels';
    protected $feild = ['level_name','delete_flg'];
}
