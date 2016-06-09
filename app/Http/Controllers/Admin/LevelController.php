<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Http\Controllers\AdminController;


use App\Models\Admin\Admin_Level;

use App\Http\Requests\LevelRequest;

class LevelController extends AdminController
{
    public function __construct(){

    	parent::__construct();

    }

    public function getIndex(){

    	return $this->loadView('level');

    }

    public function getCreate(){

    	return $this->loadView('create',['submit'=>'Thêm','action'=>'create']);

    }

     public function postCreate(LevelRequest $request){

     	$arr = $request->input();

        unset($arr['_token']);

        unset($arr['level_name_old']);

        (new Admin_Level)->insert($arr);

    	return redirect(url('admin/level'));
    }

    public function getUpdate($id){

    	$data = (new Admin_Level)->where('id',$id)->get()[0];

    	return $this->loadView('create',['submit'=>'Sửa','action'=>'update','data'=>$data]);

    }

    public function postUpdate(Request $request,$id){

    	$arr = $request->input();

        unset($arr['_token']);
      
        if($arr['level_name_old'] != $arr['level_name']){

        	if(count((new Admin_Level)->where('level_name',$arr['level_name'])->get())>0){

        		$data = (new Admin_Level)->where('id',$id)->get()[0];

        		return $this->loadView('create',['submit'=>'Sửa','action'=>'update','data'=>$data,'errunique'=>'Cấp độ đã tồn tại']);
        	
        	}else{

        		unset($arr['level_name_old']);

		    	(new Admin_Level)->where('id',$id)->update($arr);

		    	return redirect(url('admin/level'));

        	}

    	}else

    		unset($arr['level_name_old']);

	    	(new Admin_Level)->where('id',$id)->update($arr);

	    	return redirect(url('admin/level'));

    }

    public function getDelete($id){

    	(new Admin_Level)->where('id',$id)->update([
                'delete_flg' => 1
            ]);

    	return redirect(url('admin/level'));

    }


}
