<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterModel extends Model
{
   	protected $table = 'chapters';
    protected $feild = ['chapter_name','delete_flg'];
}
