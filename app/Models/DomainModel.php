<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomainModel extends Model
{
    protected $table = 'domains';
    protected $feild = ['domain_name', 'domain_description','delete_flg'];
}
