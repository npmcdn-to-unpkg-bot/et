<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\Admin\Admin_Class;

use App\Http\Controllers\AdminController;

use App\Http\Requests\ClassRequest;

class ClassController extends AdminController
{

    public function __construct(){

    	parent::__construct();

    }

    public function getIndex(){

    	return $this->loadView('class');

    }

    public function getCreate(){

    	return $this->loadView('create',['submit'=>'Thêm','action'=>'create']);

    }


    public function postCreate(ClassRequest $request){

     	$arr = $request->input();

        unset($arr['_token']);

        unset($arr['class_name_old']);

        (new Admin_Class)->insert($arr);

    	return redirect(url('admin/class'));
    }

    public function getUpdate($id){

    	$data = (new Admin_Class)->where('id',$id)->get()[0];

    	return $this->loadView('create',['submit'=>'Sửa','action'=>'update','data'=>$data]);

    }


    public function postUpdate(Request $request,$id){

    	$arr = $request->input();

        unset($arr['_token']);
      
        if($arr['class_name_old'] != $arr['class_name']){

        	if(count((new Admin_Class)->where('class_name',$arr['class_name'])->get())>0){
        		$data = (new Admin_Class)->where('id',$id)->get()[0];
        		return $this->loadView('create',['submit'=>'Sửa','action'=>'update','data'=>$data,'errunique'=>'Lớp đã tồn tại']);
        	}else{

        		unset($arr['class_name_old']);

		    	(new Admin_Class)->where('id',$id)->update($arr);

		    	return redirect(url('admin/class'));

        	}


    	}else

    		unset($arr['class_name_old']);

	    	(new Admin_Class)->where('id',$id)->update($arr);

	    	return redirect(url('admin/class'));

    }

    public function getDelete($id){

    	(new Admin_Class)->where('id',$id)->update([
                'delete_flg' => 1
            ]);

    	return redirect(url('admin/class'));

    }

}

